<?php

namespace Application\Controllers\Multiple;

use Gomail\Database\Model;

class MultipleTransferInSpamController extends MultipleReplacing implements Multiple 
{
    /**
     * Call validation methods and call the method
     * which replace all records in spam box
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return bool
     */ 
    public static function access(string $uri, Model $model)
    {   
        $multiple = new self();

        if (!$multiple->request->post()) {
            return false;
        }

        if (!$multiple->getTableName($uri)) {
            return false;
        }

        if (array_key_exists('spam', $multiple->request->post())) {
            $postData = $multiple->request->post();
            unset($postData['select-all']);
            unset($postData['spam']);
            return $model->multipleReplacingInSpam($postData, $model);
        }
    }
}