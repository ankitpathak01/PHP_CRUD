<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <?php
include('connection.php');
session_start();
if(isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn']==true){
  
}
else{
    header('location:login.php');
}

if (isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="Delete from allusers Where sno='$id'";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo'Data is deleted';
  }else{
    echo'Wrong..';
  }
}


?>
<div class="container">
    <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">EMAIL</th>
        <th scope="col">PASSWORD</th>
        <th scope="col">CONFIRM PASSWORD</th>
        <th scope="col">EDIT</th>
        <th scope="col">DELETE</th>
      </tr>
    </thead>
    <?php
    $i=1;
     $sql='Select * from allusers';
     $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <tbody>
    
      <tr>
        <th scope="row"><?php echo $i;?></th>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['password'];?></td>
        <td><?php echo $row['cpassword'];?></td>
        
        <td> <a href="update.php?id=<?php echo $row['sno']; ?>" class="btn btn-success">Edit</a></td>
        <td> <a href="home.php?id=<?php echo $row['sno']; ?>" class="btn btn-danger">Delete</a></td>
        
        
      </tr>
      <?php
       $i++;
    }
   
      ?>
      
    </tbody>

 
  </table>
  </div>


    

<div class="container">
<a href="loggout.php" class="btn btn-success">LogOut</a>
</div>

<div class="container mt-4">
<a href="form.php" class="btn btn-success">Register</a>
</div>


</body>
 </html>

