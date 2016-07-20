<?php
  // this is php comment
  /*
     Program : Simple Add and Delete operation on php using bootstarp
	   Created at : feb 10, 2014
     Code Snippets by : http://sumansapkota.com.np
  
  */
include_once("config.php");
?>
<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Registration Apps</title>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">My Project</a>
        </div>
        
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-5">
          <hr/>
          <?php // echo date_timestamp_get();
            if(isset($_POST["register"]))
				 {
				   include_once("config.php");
				   $name=$_POST['txtname'];
				   $email=$_POST['txtemail'];
				   $username=$_POST['txtusername'];
				   $password=$_POST['txtpassword'];
				   $contact=$_POST['txtcontact'];
				   $reg1="Insert into users values('','$name','$email','$username','$password','$contact','".date('y-m-d')."')";
					 mysqli_query($db_server,$reg1); 
					 echo "<h5 class='alert alert-success'>Thank You! you are registered</h5>";
				 }
          if(isset($_POST["update"])){
            $id= $_POST['id'];
           $name=$_POST['txtname'];
           $email=$_POST['txtemail'];
           $username=$_POST['txtusername'];
           $password=$_POST['txtpassword'];
           $contact=$_POST['txtcontact'];
           if($password=="")
           $query = "update users set Name='".$name."',Email='".$email."',Username='".$username."',Contact='".$contact."' where ID = '".$id."'";
         else
          $query = "update users set Name='".$name."',Email='".$email."',Username='".$username."',Contact='".$contact."',Password='".$password."' where ID = '".$id."'";
             if(mysqli_query($db_server,$query))
              echo "<h5 class='alert alert-success'>Record Updated</h5>" ;
            else
              echo "<h5 class='alert alert-danger'>Update failed </h5>";
          }
           ?>
           <?php if(!isset($_GET['id'])){ ?>
          <form class="form-horizontal" method='post' action="index.php" name="regform">
           <fieldset>
							<legend>Registration form</legend>
							<div class="control-group">
							  <label class="control-label" for="Name">Full Name </label>
							  <div class="controls">
                              <input type="text" placeholder=" Name" name="txtname" class="input-lg" required>
                              </div>
                              </div>
                              <div class="control-group">
							  <label class="control-label" for="Email">Email Address </label>
							  <div class="controls">
                              <input type="email" placeholder=" Email Address" name="txtemail" class="input-lg" required>
                              </div>
                              </div>
                              <div class="control-group">
							  <label class="control-label" for="Contact">Contact Number</label>
							  <div class="controls">
                              <input type="text" placeholder=" Contact Number" name="txtcontact" class="input-lg" required>
                              </div>
                              </div>
                              <div class="control-group">
							  <label class="control-label" for="Username">Username </label>
							  <div class="controls">
                              <input type="text" placeholder=" Username" name="txtusername" class="input-lg" required>
                              </div>
                              </div>
                              <div class="control-group">
							  <label class="control-label" for="Password">Password </label>
							  <div class="controls">
                              <input type="password" placeholder=" Password" name="txtpassword" class="input-lg" >
                              </div>
                              </div><hr/>
                              <div class="control-group">
							  
							  <div class="controls">
                              <button type="submit" class="btn  btn-primary col-md-7" name='register'><i class="glyphicon glyphicon-user"></i> Register Me Here </button>
                              </div>
                              </div>
                              
            </fieldset> 
          </form>
          <?php }
          else { 
             $id = $_GET["id"];
             $query = mysqli_query($db_server,"select * from users where ID = '".$id."'");
             while($row=mysqli_fetch_array($query)){

            ?>
              <form class="form-horizontal" method='post' action="index.php" name="regform">
           <fieldset>
              <legend>Registration form</legend>
              <div class="control-group">
                <label class="control-label" for="Name">Full Name </label>
                <div class="controls">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                              <input type="text" placeholder=" Name" name="txtname" class="input-lg" required value="<?php echo $row['Name']; ?>">
                              </div>
                              </div>
                              <div class="control-group">
                <label class="control-label" for="Email">Email Address </label>
                <div class="controls">
                              <input type="email" placeholder=" Email Address" name="txtemail" class="input-lg" required value="<?php echo $row['Email']; ?>">
                              </div>
                              </div>
                              <div class="control-group">
                <label class="control-label" for="Contact">Contact Number</label>
                <div class="controls">
                              <input type="text" placeholder=" Contact Number" name="txtcontact" class="input-lg" required value="<?php echo $row['Contact']; ?>">
                              </div>
                              </div>
                              <div class="control-group">
                <label class="control-label" for="Username">Username </label>
                <div class="controls">
                              <input type="text" placeholder=" Username" name="txtusername" class="input-lg" required value="<?php echo $row['Username']; ?>">
                              </div>
                              </div>
                              <div class="control-group">
                <label class="control-label" for="Password">Password </label>
                <div class="controls">
                              <input type="password" placeholder=" Password" name="txtpassword" class="input-lg" >
                              </div>
                              </div><hr/>
                              <div class="control-group">
                
                <div class="controls">
                              <button type="submit" class="btn  btn-primary col-md-7" name='update'><i class="glyphicon glyphicon-user"></i> Update user </button>
                              </div>
                              </div>
                              
            </fieldset> 
          </form>
          <?php } } ?>
        </div>
        <div class="col-md-7">
        <div class="panel panel-info">
         <div class="panel-body"
          <h4 class="alert alert-success">Registered Users</h4>
          <?php
		       if (isset($_GET['deletesuccess'])) {
              
              echo "<div class='alert alert-danger'>";
              echo "<a class='close' data-dismiss='alert' href='index.php'>×</a>";  
               echo "<strong> Successully Deleted  </strong>";  
               echo "</div>"; }
		  ?>
          <?php include_once("config.php"); ?>
          <?php
		  
		  $sql="select * from users";
		  $result=mysqli_query($db_server,$sql); 
		  ?>
          <table class="table table-condensed table-bordered">
           <thead>
            <tr>
             <th>SN</th>
             <th>Registered User </th>
              <th>Registered Date </th>
              <th>Action</th>
            </tr>
            </thead>
          <?php
		  $sn=0;
		  while($row=mysqli_fetch_array($result))
		  { $sn++?>
           <tbody>
            <tr>
			  <td> <?php echo $sn ?></td> 
               <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Date']; ?></td>
               <td>
                  <a href="#myModal<?php echo $row[0];?>" data-toggle="modal" class="btn btn-group-sm btn-success "><i class="glyphicon glyphicon-print"></i> View</a>
                    <div id="myModal<?php echo $row[0];?>" class="modal fade">
                     <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Detailed Record of <span class="label label-info">   <?php echo $row["Name"]; ?> </span></h4>
                     </div>
                      <div class="modal-body">
                          <p>Name : <?php echo $row["Name"]; ?></p>
                           <p>Email : <?php echo $row["Email"]; ?></p>
                            <p>Username : <?php echo $row["Username"]; ?></p>
                             <p>Contact : <?php echo $row["Contact"]; ?></p>
                              <p>Password : <?php echo $row["Password"]; ?></p>
                               
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          
                      </div>
                   </div>
                  </div>
                </div>
                  <a href='index.php?id=<?php echo $row[0];?>' class="btn btn-group-sm btn-primary "><i class="glyphicon glyphicon-edit"></i> Edit</a>
                   <a href='delete.php?id=<?php echo $row[0];?>' class="btn btn-group-sm btn-danger "><i class="glyphicon glyphicon-remove"></i> Delete</a> </td>
             </tr>
            </tbody>
		 <?php }?>
		  </table>
		  
          </div>
          </div>
       </div>
        
      </div>
      </div>
    </div>
      <footer>
        <center><p>&copy; 2014 <a href="http://facebook.com/suman.sapkota21" target="_blank">Suman Sapkota</p></center>
		<hr>
      </footer>
    <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>