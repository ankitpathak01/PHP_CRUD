<?php

include('connection.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    
//   if(isset($_POST['submit'])){
 $email=$_POST['useremail'];
 $pass=$_POST['userpassword'];
// $sql='SELECT * FROM users WHERE email="ankitpathak542000@gmail.com" AND password="123"';
$sql="SELECT * FROM allusers WHERE email='$email' AND password='$pass'";
 $result=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($result);

if($num==1){
  session_start();
  $_SESSION['loggedIn']=true;
  $_SESSION['loggedIn']==$email;

  header('location:home.php');
}
 else{
  echo"Something went wrong..";
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
<form action="login.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="useremail" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="userpassword" id="exampleInputPassword1">
  </div>
 
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
   <a href="form.php" class="btn btn-success">Register</a>
</form>
</div>


</body>
</html>