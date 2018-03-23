<?php

require_once("newconfig.php");

class Database{
 //Create a public variable
    public $conn;
    // Run the code inside constructor automatically
    function __construct(){
     //In the Construct function we want to open the database connection automatically without having to call open_db_connection()   
        $this->open_db_connection();
       
    }
    
    //Create a method to open a database connection
    public function open_db_connection(){
        
//        $this->conn = mysqli_connect(db_host,db_user,db_pass,db_name);
// Use the this keyword to access the public class variable conn and put the new connection inside
// Create a new mysqli object
        $this->conn = new mysqli(db_host,db_user,db_pass,db_name);
        // check for errors in mysqli connection with the mysqli property connect_errno
        if($this->conn->connect_errno){
            
            die("Failed".$this->conn->connect_errno);
        }else{
             echo "<p style='color:white'>hello</p>";
        }
        
        
        
    }
// Create public query method and pass $sql which is an sql query. This method is made public so we can call it outside of the database class.
    public function query($sql){
        
    // Because the connection is now object oriented we can callthe mysqli property query() which performs a query to the database not to be confused with the query method we created
        $result = $this->conn->query($sql);
       // using the private method confirm_query we can check weather the query is valid or not 
        $this->confirm_query($result);
        
        return $result;
    }
// This conform_query method is made private since we wont be using it outisde of the database class
// This method checks if the connection is valid if its not valid it will show us an error
    private function confirm_query($result){
      // Use mysqli property connect_errno to check if the query is valid
         if (!$result){
          
            die("query failed".$this->conn->connect_errno);
        }
    }
// This public function is used to escapeStrings a string is passed into it maybe can be used on input boxes;  
    public function escapeString($string){
       $escaped_string = $this->conn->real_escape_string($string);
        return $escaped_string;
    }
    
    
}
//Instantiate class
$database = new Database();


?>