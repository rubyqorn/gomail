<?php

namespace Application\Controllers\Single;

use Gomail\Database\Model;

class SingleTransferInSpamController extends SingleReplacing implements Single 
{
    /**
     * Check contains of the passed record and insert it
     * if everything is ok
     * 
     * @param $uri string
     * @param $data array
     * @param \Gomail\Database\Model $model 
     * 
     * @return bool
     */ 
    public static function access(string $uri, array $data, Model $model)
    {
        $single = new self();

        if (!$single->getTableName($uri)) {
            return false;
        }

        if (!$single->request->post()) {
            return false;
        }

        if (array_key_exists('spam', $data)) {
            unset($data['spam']);
            return $single->single->transferToSpam($single->request->post(), $model);
        }
    }
}