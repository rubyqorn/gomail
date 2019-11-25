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
    protected $table = 'messages';

    /**
     * Get all records from table
     * 
     * @return array
     */ 
    public function getAllItems()
    {
        $this->unsetQuery();
        return $this->selectAll()->getAll();
    }

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
}