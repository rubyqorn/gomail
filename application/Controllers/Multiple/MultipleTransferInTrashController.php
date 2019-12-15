<?php

namespace Application\Controllers\Multiple;

use Gomail\Database\Model;

class MultipleTransferInTrashController extends MultipleReplacing implements Multiple 
{
    /**
     * Call validation methods and call the method
     * which delete all records
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return bool
     */ 
    public static function access($uri, Model $model)
    {
        $multiple = new self();

        $validation = $multiple->getTableName($uri);

        if (!$validation) {
            return false;
        }
        

        if (!$multiple->request->post()) {
            return false;
        }
        

        if (array_key_exists('trash', $multiple->request->post())) {
            $postData = $multiple->request->post();
            unset($postData['select-all']);
            unset($postData['trash']);
            return $multiple->multiple->deletion($postData, $model);
        }

    }

}