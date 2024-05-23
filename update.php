<?php
include('connection.php');
if(isset($_GET['id'])){
   $sno=$_GET['id'];


   $sql="Select * from `allusers` where `sno`='$sno'";
   $result=mysqli_query($conn,$sql);

   if($result){
    $row=mysqli_fetch_assoc($result);
   
   }
   else{
    die("Error").mysqli_error();
   }

   if(isset($_POST['submit'])){
    $newid=$_GET['id'];
    $email=$_POST["useremail"];
    $password=$_POST["userpassword"];
    $cpassword=$_POST["confirmpassword"];
  
    $sql="Update allusers SET email='$email',password='$password',cpassword='$cpassword',date='current_timestamp()' WHERE sno='$newid'";
    $result=mysqli_query($conn,$sql);
   if($result){
    header('location:home.php');
   }
  }




    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container my-4">
<form action="update.php?id=<?php echo $_GET['id'] ?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="useremail" id="exampleInputEmail1" value="<?php echo $row['email'];  ?>"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="userpassword" value="<?php echo $row['password'];  ?> id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name="confirmpassword" class="form-control"value="<?php echo $row['cpassword'];  ?>  id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


</body>
</html>