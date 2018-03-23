<?php include ("includes/header.php") ?>
<?php
$the_message ="";
if($sessions->is_signed_in()){
    
    redirect("index.php");
}

if(isset($_POST['submit'])){
    
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
   
    
    //check database user 
    //We call a static method from the users class called verfiy_user to check if the user and password returns a value
   $user_found = users::verify_user($username, $password);
   
    if($user_found){
        echo "This page";
        $sessions->login($user_found);
       
        redirect("index.php");
    }else{
        echo "This page";
        $the_message  = "Your password or username is incorrect";
    }
    
}else{
     $username = "";
     $password = "";
}

?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>




