<?php
/**
 * Created by PhpStorm.
 * User: Babacar Mbengue
 * Date: 22/03/2019
 * Time: 22:17
 */

class FlashService
{
    /**
     * @var Session
     */
    private $session;

    private $messages=[];

    public function __construct(Session $session)
   {
       $this->session = $session;
   }

   public function success($message){
        $flash = $this->session->get('flash',[]);
        $flash['success'] = $message;
        $this->session->set('flash',$flash);
   }
    public function error($message){
        $flash = $this->session->get('flash',[]);
        $flash['error'] = $message;
        $this->session->set('flash',$flash);
    }
    public function get($key){
        if(isset($this->messages[$key])){
            return $this->messages[$key];
        }
        $flash = $this->session->get('flash',[]);
        if(array_key_exists($key,$flash)){
            $this->messages[$key] = $flash[$key];
            unset($flash[$key]);
            $this->session->set('flash',$flash);
            return $this->messages[$key];

        }

        return null;
    }
}