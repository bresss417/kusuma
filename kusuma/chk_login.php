<?php
include('data/conf.php');
session_start();

    $number = $_POST['number_std'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE number_std='$number' AND password='$pass'";
    $que =mysqli_query($conn,$sql) or die(mysqli_error());
    $num = mysqli_fetch_assoc($que);
    $_SESSION['status'] = $num['status'];
    if(!$num){
        echo "  
        <script>
            alert('email and password null');
            window.location = 'index.php';
        </script>
        ";
    }else if($num['status'] == 'admin'){
        $_SESSION['users'] = $num;
        echo "  
        <script>
            alert('ยินดี ต้อนรับ admin');
            window.location = 'admin';
        </script>
        ";
    }else if($num['status'] == 'user'){
        $_SESSION['users'] = $num;
        echo "  
        <script>
            alert('ยินดี ต้อนรับ user');
            window.location = 'users';
        </script>
        ";
    }
?>