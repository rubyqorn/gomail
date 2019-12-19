<?php

namespace Application\Controllers;

use Application\Models\Spam;

class SpamedMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Spam
     */ 
    protected $spam;

    /**
     * Contains a URI of main page
     * 
     * @var string 
     */ 
    protected $uriName = '/spamed/page/1';

    public function __construct()
    {
        parent::__construct();

        $this->spam = new Spam();
    }

    /**
     * Show page with spamed messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Спам';
        $authUser = $this->user->getAuthUser();
        $messages = $this->spam->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Spam();
        
        return $this->view->render('spam', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search spamed messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $title = 'Поиск по заблокированным сообщениям';
        $searchContent = $this->spam->searchContent($this->request);

        return $this->view->render('search-content', compact('searchContent', 'title'));
    }

    /**
     * Replace all spamed messages into trash.
     * It means that we delete all spamed message.
     * Create a session with error or success message 
     * and finnaly redirect at first page
     * 
     * @return \Gomail\Session\Session
     */ 
    public function replaceInto()
    {
        if ($this->request->checkHttpMethod('POST')) {
            $this->multipleDeletion = $this->accessMultipleReplacing(
                $this->request->post(),
                $this->spam
            );

            if ($this->multipleDeletion == false) {
                $this->request->session('error', 'Проблема с перемещением');
                return $this->request->redirect($this->uriName);
            }
            
            $this->request->session('success', 'Все записи успешно перемещены');
            return $this->request->redirect($this->uriName);
        }

        return $this->request->redirect($this->uriName);
    }

    /**
     * Replace a single message into trash, spam or
     * importants tables
     * 
     * @return \Gomail\Request\Session
     */ 
    public function replaceSingleRecord()
    {
        $replacing = $this->accessSingleReplacing(
            $this->request->getPreviousUri(),
            $this->request->post(),
            $this->spam
        );

        if ($replacing) {
            $this->request->session('success', 'Сообщение успешно перемещено');
            return $this->request->redirect($this->uriName);
        }

        $this->request->session('error', 'Проблема с перемещением сообщения');
        return $this->request->redirect($this->uriName);
    }
}