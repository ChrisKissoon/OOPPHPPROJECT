<?php

function classAutoLoader ($class){
    
    $class = strtolower($class);
    
    $the_Path = "includes/{$class}.php";
 if(is_file($the_Path) && !class_exists($class)){
     
     include $the_Path;
 }
    
}
spl_autoload_register("classAutoLoader");


//This function redirects the user to a particular page according to what link is in the parameter
 function redirect($location){
        header("Location: {$location}");
   } 
?>