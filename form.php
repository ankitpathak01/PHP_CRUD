<?php
include('connection.php');

// if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['submit'])){
  $email=$_POST['useremail'];
  $userpassword=$_POST['userpassword'];
  $confirmpassword=$_POST['cpassword'];

// $sql="INSERT INTO `users` ( `email`, `password`,`cpassword`) VALUES ('$email', '$userpassword','$confirmpassword')";
$existsql="Select * from allusers where email='$email'";
$result=mysqli_query($conn,$existsql);
$num=mysqli_num_rows($result);
if($num>0){
  echo'Useremail already exist';
}
else{

  if($userpassword==$confirmpassword || !empty($email)){
    $sql="INSERT INTO `allusers` (`email`, `password`, `cpassword`, `date`) VALUES ('$email', '$userpassword','$confirmpassword' ,current_timestamp())";
    $result=mysqli_query($conn,$sql);
    if($result){
      header('location:login.php');
    }
    else{
      echo "Data insertion failed".mysqli_error($conn);
    }
  }
  else{
    echo 'Password do not match.';
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
<form action="form.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="useremail" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="userpassword" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="cpassword" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="container">
<a href="login.php" class="btn btn-success">Login</a>
</div>

</body>
</html>