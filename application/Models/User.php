<?php

namespace Application\Models;

use Gomail\Database\Model;
use Application\Models\Traits\Validator;

class User extends Model
{
    use Validator;

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

    /**
     * Update user settings
     * 
     * @param $settings array
     * 
     * @return bool
     */ 
    public function updateUserSettings($settings)
    {
        $this->validation($settings);

        if (!isset($_SESSION['error'])) {

            array_push($settings, $this->getAuthUser()['id']);
            $id = array_pop($settings);
            $this->unsetQuery();

            if (count($settings) < 5) {
                return $this->update('country = ?, city = ?, image = ?', 'id = ?', [
                    !empty($settings['country']) ? $settings['country'] : NULL, 
                    !empty($settings['city']) ? $settings['city'] : NULL, 
                    !empty($settings['image']) ? $settings['image'] : 'avatar.png', $id
                ]);
            }

            return $this->update('name = ?, surname = ?, country = ?, city = ?, image = ?', 'id = ?', [
                $settings['name'], $settings['surname'], 
                !empty($settings['country']) ? $settings['country'] : NULL, 
                !empty($settings['city']) ? $settings['city'] : NULL, 
                !empty($settings['image']) ? $settings['image'] : 'avatar.png', $id
            ]);
    
        }

        return $_SESSION['error'];
    }
}