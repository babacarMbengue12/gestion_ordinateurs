<?php
/**
 * Created by PhpStorm.
 * User: Babacar Mbengue
 * Date: 22/03/2019
 * Time: 22:13
 */

class Session
{


    public function get($key,$default = null){
      if($this->has($key)){
          return $_SESSION[$key];
      }
      return $default;
    }

    public function has($key){
        $this->ensureStarted();
        return isset($_SESSION[$key]);
    }

    public function set($key,$value){
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    private function ensureStarted(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public function delete($key)
    {
        if($this->has($key)){
            unset($_SESSION[$key]);
        }
    }

}