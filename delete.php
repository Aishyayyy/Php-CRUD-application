<?php
    include 'conn.php';
    if (isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;
    $q="DELETE from CRUDtable where id= $id ";
    mysqli_query($con,$q);
    header('location:display.php');
}
else{
    echo 'Nope';
}
?>