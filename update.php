<?php
    include 'conn.php';
     if(isset($_POST['done'])){
        $id=$_GET['id'];
        echo 
        $email=$_POST['email'];
        $password=$_POST['password'];
        $q= "UPDATE CRUDtable set id=$id,username='$email',password='$password' where id=$id;";
        $query=mysqli_query($con,$q) or trigger_error("Details not entered".mysqli_error($con));
        header('location:display.php'); 
     }
   

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
</head>
<body>

    <div class ="col-lg-6 m-auto">
    <form method ="post"></br>
        <div class="card">
            <div class="card-header bg-light">
                <h1 class="text-gray text-center"> Update</h1>
            </div>  
            

        <div class="form-group"><br>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" >

        <small id="emailHelp" class="form-text text-muted">"We'll never share your email with anyone else." </small>
        </div>
        <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
           </div>
     <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
     </div>
  <button type="submit" class="btn btn-success" name="done">Submit</button>
</form>
</body>
</html>
