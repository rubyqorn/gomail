<?php

namespace Application\Controllers;

use Application\Models\Sent;

class SentMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Sent
     */ 
    protected $sent;

    /**
     * Contains a URI with first page
     * 
     * @var string
     */ 
    protected $uriName = '/sent/page/1';

    public function __construct()
    {
        parent::__construct();

        $this->sent = new Sent();
    }

    /**
     * Show page with sent messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отправленные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->sent->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Sent();

        return $this->view->render('sent', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search sent messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $title = 'Поиск по отправленным сообщениям';
        $searchContent = $this->sent->searchContent($this->request);

        return $this->view->render('search-content', compact('title', 'searchContent'));
    }

    /**
     * Replace all sent messages into trash.
     * It means that we delete all sent message.
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
                $this->sent
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

    public function replaceSingleRecord()
    {
        //
    }
}