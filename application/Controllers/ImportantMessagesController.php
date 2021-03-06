<?php

namespace Application\Controllers;

use Application\Models\Important;

class ImportantMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Important
     */
    protected $important;

    /**
     * Contains a name of current URI
     * 
     * @var string
     */ 
    protected $uriName = '/important/page/1';
 
    public function __construct()
    {
        parent::__construct();

        $this->important = new Important();
    }

    /**
     * Show page with important messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Важные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->important->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Important();

        return $this->view->render('important', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search messages which checked like
     * important
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if ($this->request->checkHttpMethod('POST')) {
            $title = 'Поиск по важным сообщениям';
            $searchContent = $this->important->searchContent($this->request);

            return $this->view->render('search-content', compact('title', 'searchContent'));
        }

        return $this->request->redirect($this->uriName);
    }

    /**
     * Replace all important messages into trash.
     * It means that we delete all important message.
     * Create a session with error or success message 
     * and finnaly redirect at first page
     * 
     * @return \Gomail\Session\Session
     */ 
    public function replaceInto()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $this->multipleDeletion = $this->accessMultipleReplacing(
            $this->request->post(),
            $this->important
        );

        if ($this->multipleDeletion == false) {
            $this->request->session('error', 'Проблема с перемещением');
            return $this->request->redirect($this->uriName);
        }
        
        $this->request->session('success', 'Все записи успешно перемещены');
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
            $this->important
        );

        if ($replacing) {
            $this->request->session('success', 'Запись успешно перемещена');
            return $this->request->redirect($this->uriName);
        }

        $this->request->session('error', 'Проблема с перемещением сообщения');
        return $this->request->redirect($this->uriName);
    }
}