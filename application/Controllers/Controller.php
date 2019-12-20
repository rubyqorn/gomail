<?php

namespace Application\Controllers;

use Gomail\Request\Request;
use Gomail\View\View;
use Gomail\Database\Model;
use Application\Models\User;
use Application\Controllers\Multiple\MultipleTransferInSpamController;
use Application\Controllers\Multiple\MultipleTransferInTrashController;
use Application\Controllers\Single\SingleTransferInImportantsController;
use Application\Controllers\Single\SingleTransferInSpamController;
use Application\Controllers\Single\SingleTransferInTrashController;
use Application\Controllers\Single\SingleTransferInCheckedController;

class Controller 
{
    /**
     * @var \Gomail\Request\Request
     */ 
    protected $request;
    
    /**
     * @var \Gomail\View\View
     */ 
    protected $view;

    /**
     * @var \Application\Models\User
     */ 
    protected $user;
    
    /**
     * @var \Application\Controllers\MultipleTransferInTrashController
     */
    protected $multipleDeletion;

    /**
     * @var \Application\Controllers\MultipleTransferInSpamController
     */ 
    protected $multipleSpam;

    public function __construct()
    {
        $this->request = new Request();
        $this->view = new View();
        $this->user = new User();
    }

    /**
     * Check if user have cookie named login
     * and redirect to current URI
     * 
     * @return bool
     */
    public function checkIsUserAuth()
    {
        if (!isset($_COOKIE['login'])) {
            $this->request->redirect('/login');
        }
    }

    /**
     * Check for in the array was a trash 
     * or spam key and access two objects
     * 
     * @param $data array
     * 
     * @return \Application\Controllers\MultipleTransferInTrashController
     *          \Application\Controllers\MultipleTransferInSpamController
     */ 
    public function accessMultipleReplacing(array $data, Model $model)
    {
        if (!is_array($data)) {
            return $this->request->redirect('/');
        }

        if (in_array('trash', array_keys($data))) {
            return MultipleTransferInTrashController::access(
                $this->request->getPreviousUri(), $model
            );
        } elseif (in_array('spam', array_keys($data))) {
            return MultipleTransferInSpamController::access(
                $this->request->getPreviousUri(), $model
            );
        }

        return $this->request->redirect($this->request->getPreviousUri());
    }

    /**
     * Get an object of clasess which replace single
     * record into spam, important, trash tables
     * 
     * @param $uri string
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return \Application\Controllers\Single\SingleTransferInTrashController
     *          \Application\Controllers\Single\SingleTransferInSpamController
     *          \Application\Controllers\Single\SingleTransferInImportantsController
     *           \Application\Controllers\Single\SingleTransferInCheckedController
     */ 
    public function accessSingleReplacing($uri, $data, Model $model) 
    {
        switch($data) {
            case array_key_exists('trash', $data):
                return SingleTransferInTrashController::access($uri, $data, $model);
            break;
            case array_key_exists('star', $data):
                return SingleTransferInImportantsController::access($uri, $data, $model);
            break;
            case array_key_exists('spam', $data): 
                return SingleTransferInSpamController::access($uri, $data, $model);
            break;
            case array_key_exists('checked', $data):
                return SingleTransferInCheckedController::access($uri, $data, $model);
            default:
                return $this->request->redirect('/');
            break;
        }
    }
}