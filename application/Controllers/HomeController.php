<?php

namespace Application\Controllers;

use Application\Models\Message;
use Application\Models\User;

class HomeController extends Controller
{
    /**
     * @var \Application\Models\Message
     */ 
    protected $message;

    /**
     * Contains a URI name which will
     * be using for redirecting
     * 
     * @var string
     */ 
    protected $uriName = '/messages/page/1';

    public function __construct()
    {
        parent::__construct();

        $this->message = new Message();
    }

    /**
     * Redirect to the home page
     * 
     * @return \Gomail\Request\Request
     */ 
    public function index()
    {
        $this->checkIsUserAuth();

        if ($this->request->getCurrentUri() == '/') {
            return $this->request->redirect($this->uriName);
        }

        return $this->request->redirect('login');
    }

    /**
     * Show home page
     * 
     * @return \Gomail\View\View
     * */ 
    public function box()
    {
        $this->checkIsUserAuth();

        $title = 'Почта';
        $messages = $this->message->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Message();
        $authUser = $this->user->getAuthUser();

        return $this->view->render('home', compact('title', 'authUser', 'messages', 'pagination'));
    }

    /**
     * Search messages 
     * 
     * @return \Gomail\View\View
     * */ 
    public function search()
    {
        if ($this->request->checkHttpMethod('POST')) {
            $title = 'Поиск по сообщениям';
            $searchContent = $this->message->searchMessages($this->request);

            return $this->view->render('search-content', compact('searchContent', 'title'));
        }   
        
        return $this->request->redirect($this->uriName);
    }

    /**
     * Get all records and call the method of 
     * controller which delete records. And finally 
     * redirect to the home page with success message
     * 
     * @return \Gomail\Request\Session
     */ 
    public function replaceTo()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $this->multipleDeletion = $this->accessMultipleReplacing($this->request->post(), $this->message);

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
            $this->message
        );

        if ($replacing) {
            $this->request->session('success', 'Сообщения успешно перемещено');
            return $this->request->redirect($this->uriName);
        }

        $this->request->session('error', 'Возможно сообщения существуют в других директориях');
        return $this->request->redirect($this->uriName);
    }

    /**
     * Get single record and display in the template
     * 
     * @param int $id
     * 
     * @return \Gomail\View\View
     */ 
    public function displaySingleRecord($id)
    {
        $ownMessages = $this->message->getFirstFiveMessages();
        $singleMessage = $this->message->getMessageById($id);
        $title = 'Сообщение от: ' . $singleMessage['name'] . ' ' . $singleMessage['surname'];

        return $this->view->render('message', compact('ownMessages', 'singleMessage', 'title'));
    }
}