<?php

class Session{
    
// We want to see if the user is signed in with this property. We can run other fmethods such as login and set this true or false to enable a sign in. This is private since this will be used in a method and not outside of the object.   
   private $signed_in = false;
//Here we use the userid to check    
   public $user_id;

  
 
//using the constructor function we can start the session without having to call it every time

    function __construct(){
        session_start();
        //here we run the check_the_login() function which
        $this->check_the_login();
       
    }
    
    
   public function is_signed_in(){
       
       
        return $this->signed_in;
       
       
   }    
   public function login($user){
        if($user){
            
           $this->user_id = $_SESSION['user_id'] = $user->id;
           
           $this->signed_in = true;

        }
   } 
  
   public function logout(){
       unset($_SESSION['user_id']);
       unset($this->user_id);
       $this->signed_in = false;
   } 
       
    
    
private function check_the_login(){
     
    //We check if the session variable user_id is infact set if it is then we do something
       if(isset($_SESSION['user_id'])){
    //We then store the session variable inside the user_id property
            
            $this->user_id = $_SESSION['user_id'];
    //And we change the signed_in property true since the session variable isset
//            $this->signed_in = true;
           
            echo $this->signed_in;
            echo "<p style='color:white'>This is true</p>";
           
       }else{
           unset($this->user_id);
           $this->signed_in = false;
           echo "<p style='color:white'>This is false until it is true</p>";
           
       }
       
       
       
   } 

  
    
    
    
}

// We instantiate the class sessions and store it in a variable sessions
$sessions = new Session();

?>