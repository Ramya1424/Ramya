<?php

$email_username = $_POST['email_username'];
$userpassword = $_POST['userpassword'];

$conn = new mysqli("localhost","root","","jack_guvi");

if(mysqli_connect_error())
{
    echo"<script>alert('Unable to connect to database');</script";
    exit();
}
else
{
    $stmt = $conn->prepare("select * from user where email = ?");
    $stmt->bind_param("s", $email_username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows   >0)
    {
        $data = $stmt_result->fetch_assoc();
        if($data["email"] === $email_username && $data['password'] === $userpassword)
        {
            echo"<script>window.location.assign('profile.html');
            alert('login successful');</script";
        }
        else
        {
            echo"<script>window.location.assign('profile.html');
            alert('login successful');</script>";
        }
    }
    else
    {
        echo"<script>window.location.assign('login.html');
        alert('Invalid username or passwords');</script>";  
    }
    $stmt->close();
    $conn->close();
}
