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
     * Check if user exists. If user with passed in email
     * field exists return boolean property and if it's
     * not true delete SQL query
     * 
     * @param $email string
     * 
     * @return bool
     */ 
    protected function checkUserExists($email) 
    {
        $user = $this->selectAll()->where("email = '{$email}' ")->getOne();

        if ($user['email'] == $email) {
            return true;
        }
        
        return $this->unsetQuery();
    }

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

            if ($this->checkUserExists($fields['email'])) {
                return false;
            }

            $password = $this->hasher->hash($fields['password']);

            return $this->insert('name, surname, email, password, country, city', '?,?,?,?,?,?', [
                $fields['name'], $fields['surname'], $fields['email'], $password, null, null
            ]);
            
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

    /**
     * Get user id by email string
     * 
     * @param $email string
     * 
     * @return array
     */ 
    public function getUserId($email)
    {
        $this->unsetQuery();
        return $this->selectRows('id')->where(" email = '{$email}' ")->getOne();
    }

    /**
     * Get auth user
     * 
     * @return array
     */ 
    public function getAuthUser()
    {
        $this->unsetQuery();
        return $this->selectAll()->where("email = '{$_COOKIE['login']}' ")->getOne();  
    }
}