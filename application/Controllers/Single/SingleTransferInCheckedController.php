<?php

namespace Application\Controllers\Single;

use Gomail\Database\Model;

class SingleTransferInCheckedController extends SingleReplacing implements Single 
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

        if (!$single->request->post()) {
            return false;
        }
        
        if (!$single->getTableName($uri)) {
            return false;
        }

        if (array_key_exists('checked', $data)) {
            unset($data['checked']);
            return $single->single->transferIntoChecked($single->request->post(), $model);
        }
    }
}