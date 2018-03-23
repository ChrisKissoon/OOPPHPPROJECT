<?php include("includes/header.php"); ?>


        <!-- Navigation --> 
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
           
            <?php include ("includes/top-nav.php"); ?>
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/nav-left.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <?php
                        
                          
                            
//                        $resultSet =  user::findAllUsers();
//                        
//                        while($row = mysqli_fetch_array($resultSet)){
//                        
//                          
//                            echo $row['username'] ;
//                           
//                          
//                        }
                       
//                        $resultId = user::findById(1);
//                        
//                        $user = user::instantation($resultId);
//                        
//                        echo $user->id."<br>";
//                        echo $user->username."<br>"; 
//                        echo $user->password."<br>";    
                        
                          $users =  users::findAllUsers();
                         
                             foreach($users as $user){
                               
                                echo  $user->username;
                                 
                             } 
                        
//                        $singleUser = users::findById(1);
//                     
//                        echo $singleUser->id;
//                        echo $singleUser->username;
//                        echo $singleUser->password;
//                        echo $singleUser->first_name;
//                        echo $singleUser->last_name;
                      
                      
                        ?>


                <?php  
                        //$sql = "SELECT * from users";
                        //$result = $database->query($sql);
                        //$more = mysqli_fetch_array($result);
                       
                    //print("<pre>".print_r($more,true)."</pre>");
                       
?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>