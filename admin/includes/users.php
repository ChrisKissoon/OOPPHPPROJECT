<?php 

class users{
    //create properties so we can call information from the database more easily
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    
    
    
    
   //We created a static method findallusers() in this way we dont have to instantiate the user class using new User(); instead we can call the static function like so Users::findAllusers(). However becuase we arent instianting a class we cant access other static classes inside findallusers.  
    
  //This method finds all the users 
     public static function findAllUsers(){
        // use the new method find_this_query to query the database. Because it is a static method we call the method by using self and call the method. this method then runs the query. 
         //As long as a method is static we need to use self
       return self::find_This_Query("SELECT * FROM users");
         
   
     }  
//This method finds a specific user by id.
     public static function findById($id){
        
        $the_result_array = self::find_This_Query("SELECT * FROM users WHERE id = {$id} LIMIT 1");
        
        //Check to see if the result array is not empty if its not them we want to get the first item from the array which seems strange since we already created a query that is sure to get only one result. 
        return !empty($the_result_array) ? array_shift($the_result_array): false;
 
     } 
    //This method takes a sql query and executes it.
    public static function find_This_Query($sql){
        //create access to database class
        global $database;
        //Execute query using the query method in database class
        $result_set = $database->query($sql);
      //create an array to store the result of the query
        $the_object_array = array();
       
        
       //Loop through the query results as an array 
        while($row = mysqli_fetch_assoc($result_set)){
            
          //instantate each row and then store into object array
          // The instante method takes the row loops through it and checks if the attribute such as username is also a valid property in the user class
           $the_object_array[] = self::instantation($row);//The self is used since instantation method is a static method. 
         
            
        }
         return $the_object_array;
 
     }
     
     public static function verify_user($username, $password){
         
         global $database;
         
         $username = $database->escapeString($username);
         $password = $database->escapeString($password);
         
         $sql = "SELECT * FROM users WHERE ";
         $sql .="username = '{$username}' ";
         $sql .="AND password = '{$password}' ";
         $sql .="LIMIT 1";
         
         $the_result_array = self::find_This_Query($sql);
        
         
         return !empty($the_result_array) ? array_shift($the_result_array): false;
         
     }
     
     public static function instantation($theRecord){
    
        $the_object = new self; //this code says instantiate the class users and store as $the_object
        
        foreach($theRecord as $the_attribute => $value){// Loop through a result which is received through $theRecord this result is received from calling the find_this_query method which gives us a record.
        
          
        //With this if statement we check to see if the_object which is the user object has the attribute or property that is received from the forloop eg firstname in users and firstname in the_attribute. This is done calling another method called has_the_attribute
            if($the_object->has_the_attribute($the_attribute)){ 
                //if this attribute is in the User object  then we want to assign the value of the attribute or property of Users such as username the value eg "peter1234"
                $the_object->$the_attribute = $value;
                
            }
            
          
            
        }
          //returns the updated object with values inserted into the properties
         return $the_object;           

         
       
     }  
  //This method checks the properties of the object to see if it matches the attributes in the record from the query.       
private function  has_the_attribute($the_attribute){
    
    //The line gets all the properties of the User class and stores it in object properties
    $object_properties = get_object_vars($this);
 
   //This line returns whether the attribute exisits in the object property ad returns a true or false whenever the has_the_attribute is called
    return array_key_exists($the_attribute, $object_properties);
    if(array_key_exists($the_attribute, $object_properties)){
        
        
        return true;
    };
     
    
    
}       
        
        
        
        
        
        
        
}






?>