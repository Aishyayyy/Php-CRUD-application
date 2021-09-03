<?php
 include 'conn.php';
    $q= "SELECT * from CRUDtable";
    $query=mysqli_query($con,$q) or trigger_error("Details not entered".mysqli_error($con));
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="col-lg-12">
            <br><br>
            <h1 class="text-warning text-center"> DISPLAY TABLE DATA</h1>
            <a href="index.php" class="btn btn-primary shadow-lg">Add new user</a>
            <br>
            <table class="table table striped table-hover table-bordered">
                <tr class="bg-dark text-white">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Image</th>
                    <th>DELETE</th>
                    <th>UPDATE</th>
                </tr>
                <?php while($res = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $res['id'] ?></td>
                    <td><?php echo $res['username'] ?></td>
                    <td>
                        <img src="Images/<?php echo $res['image'] ;?>" width="200" height="200" />
                    </td>
                    <td><button class="btn btn-danger text-light" name=""><a class="text-light"
                                href="/CRUDapplication/delete.php?id=<?php echo $res['id']; ?>"> DELETE</a></button>
                    </td>
                    <td><button class="btn btn-primary  text-white "><a class="text-light"
                                href="/CRUDapplication/update.php?id=<?php echo $res['id'];?>">UPDATE</a></button></td>
                </tr>
                <?php
              }
              ?>
            </table>

        </div>
    </div>
</body>

</html>