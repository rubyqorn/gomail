<?php

namespace Application\Controllers\Single;

use Gomail\Database\Model;

class SingleTransferInTrashController extends SingleReplacing implements Single 
{
    /**
     * Access single record replacing
     * in trash
     * 
     * @param $uri string
     * @param \Gomail\Database\Model $model
     * 
     * @return \Gomail\Request\Session 
     */ 
    public static function access(string $uri, Model $model)
    {
        $single = new self();

        if (!$single->getTableName($uri)) {
            return false;
        }

        if (!$single->request->post()) {
            return false;
        }

        if (array_key_exists('trash', $single->request->post())) {
            $postData = $single->request->post();
            unset($postData['trash']);

            return $single->single->transferToTrash($postData, $model);

        }
    }
}