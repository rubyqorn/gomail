<?php

namespace Application\Models;

use Gomail\Database\Model;

class User extends Model
{
    /**
     * Table name which will be using
     * with this model
     * 
     * @var string
     */ 
    protected $table = 'users';

    /**
     * Register new user
     * 
     * @param $fields array
     * 
     * @return bool
     */ 
    public function registerUser($fields)
    {
        if (is_array($fields)) {

            if ($this->selectRows('email')->where(" email = '{$fields['email']}' ")->getOne()) {
                return false;
            } else {
                $password = $this->hasher->hash($fields['password']);

                return $this->insert('name, surname, email, password, country, city', '?,?,?,?,?,?', [
                    $fields['name'], $fields['surname'], $fields['email'], $password, null, null
                ]);
            }
        }
    }

    /**
     * Login user
     * 
     * @param $fields array
     * 
     * @return bool 
     */ 
    public function loginUser($fields)
    {
        $password = $this->selectRows('password')->where("email = '{$fields['email']}'")->getOne();
        
        if ($this->verifier->verify($fields['password'], $password['password'])) {
            return true;
        }
    }
}