<?php
 include 'conn.php';

 if(isset($_POST['done'])){ 
    $email=$_POST['email'];
    $password=$_POST['password'];
    echo empty($_FILES['file']);
    $errors = array(); 
    if (empty($email)){
        $errors['e']="Email Required";
    }
    if (empty($password)){
        $errors['p']="Password Required";
        }   
    if (!empty($_FILES['file']['name'])){
        $file=$_FILES['file']['name'];
        $target_folder = 'Images/';
        $target_file = $target_folder.$file;
        if (move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
            $q= "INSERT INTO crudtable (username,password,image) values('$email','$password','$file');";
            $query=mysqli_query($con,$q) or trigger_error($con);
            header("Location:display.php");
        }
    }
        else{
        $q= "INSERT INTO crudtable (username,password) values('$email','$password');";
            $query=mysqli_query($con,$q) or trigger_error($con);
            header("Location:display.php");
        }
    
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

    <div class="col-lg-6 m-auto">
        <form method="post" enctype="multipart/form-data"><br />
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-gray text-center"> Create</h1>
                </div>
                <?php   
                $emailErr = $passErr = "";
                $email = $password = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            }
        }
             ?>


                <div class="form-group"><br>
                    <label for="exampleInputEmail1">Email address</label>
                    <input required type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email" name="email"
                        pattern="^[^\s@]+@[^\@]+\[^\s@]+$" class="error"
                        oninvalid="setCustomValidity('* Email should conation @ and . ' )">
                    <small id="emailHelp" class="form-text text-muted">"We' ll never share your email with anyone
                        else." </small>
                    <p class="text-danger"> <?php if(isset($errors['e'])) echo $errors['e'] ?></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" required>Password</label><br>
                    <input type="password" placeholder="Password" name="password"
                        pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" class="error"
                        oninvalid="setCustomValidity('Password should contain 8 letters with one lowercase, one uppercase and a special character!')"
                        required>
                    <p class="text-danger"> <?php if(isset($errors['p'])) echo $errors['p'] ?></p>
                </div>
            </div>
            <div class="form-group" role="group" aria-label="Upload a file">
                <label for="files"></label>
                <input type="file" id="file" name="file" placeholder="Upload">
                <button type="submit" class="btn btn-success" name="done">Submit</button>


        </form>
</body>

</html>