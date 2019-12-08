<?php 

namespace Application\Controllers;

use Application\Models\Check;

class CheckedMessagesController extends Controller 
{
    /**
     * @var \Application\Models\Check
     */ 
    protected $check;

    /**
     * Contains a name of current URI
     * 
     * @var string
     */ 
    protected $uriName = '/checked/page/1';

    public function __construct()
    {
        parent::__construct();

        $this->check = new Check();
    }

    /**
     * Show page with checked messages
     * 
     * @return bool 
     */ 
    public function show()
    {
        $title = 'Отмеченные';
        $authUser = $this->user->getAuthUser();
        $messages = $this->check->getRecordsForPagination($this->request->getPageNumber(), 5);
        $pagination = new Check();

        return $this->view->render('check', compact('title', 'messages', 'pagination', 'authUser'));
    }

    /**
     * Search checked messages
     * 
     * @return \Gomail\View\View
     */ 
    public function search()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $title = 'Поиск по отмеченным сообщениям';
        $searchContent = $this->check->searchContent($this->request);

        return $this->view->render('search-content', compact('searchContent', 'title'));
    }

    /**
     * Replace all checked messages into trash.
     * It means that we delete all checked message.
     * Create a session with error or success message 
     * and finnaly redirect at first page
     * 
     * @return \Gomail\Session\Session
     */ 
    public function replaceIntoTrash()
    {
        if (!$this->request->checkHttpMethod('POST')) {
            return $this->request->redirect($this->uriName);
        }

        $multipleDeletion = MultipleTransferInTrashController::access($this->request->getPreviousUri(), $this->check);

        if ($multipleDeletion == null) {
            $this->request->session('success', 'Все отмеченные сообщения удалены');
            return $this->request->redirect($this->uriName);
        }

        $this->request->session('error', 'Проблема с удалением отмеченных сообщений');
        return $this->request->redirect($this->uriName);


    }
}