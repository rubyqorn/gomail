<?php

namespace Application\Controllers\Single;

use Gomail\Database\Model;

class SingleTransferInImportantsController extends SingleReplacing implements Single 
{
    /**
     * Replace records into importants table
     * 
     * @param $uri string
     * @param $data array
     * @param \Gomail\Database\Model
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

        if (array_key_exists('star', $single->request->post())) {
            unset($data['star']);
            return $single->single->transferIntoImportants($uri, $data, $model);
        }
    }
}