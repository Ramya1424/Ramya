<?php

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mob_no = $_POST['mob_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost","root","","jack_guvi");

    if(mysqli_connect_error())
    {
        echo"<script>alert('unable to connect to database');</script>";
        exit();
    }
    else
    {
        $stmt = $con->prepare("insert into user(fullname,email,mob_no,username,password) values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$fullname,$email,$mob_no,$username,$password);
        $stmt->execute();
        $stmt->close();
        $con->close();
    }
 ?>
    <script>
        window.location.assign("login.html");
        alert("Registeration Successful")
        </script>