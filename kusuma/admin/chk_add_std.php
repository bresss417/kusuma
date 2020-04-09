<?php
include('../data/conf.php');

$exe = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
$new_img = 'img_' .uniqid(). ".".$exe;
$img_path = "../photo_users/";
$upload_path = $img_path.$new_img;
$success = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);
 if($success==FALSE){
    $calback = array(
       'status' => 404,
       'msg' => 'Upload Images False'
    );
    exit();
 }

    $name = $_POST['name'];
    $last = $_POST['last'];

    $user = join(array($name," ",$last));
    $number_std = $_POST['number_std'];
    $pass = $_POST['pass'];
    $class = $_POST['class'];
    $d_partment = $_POST['d_partment'];
    $photo = $new_img;
    $phone = $_POST['phone'];
    $status = "user";

    $chk_number_std = mysqli_query($conn,"SELECT number_std FROM users WHERE number_std='$number_std'") or die(mysqli_error());
    $num = mysqli_num_rows($chk_number_std);
    if($num > 0){
        echo "  
        <script>
            alert('รหัส น.ศ มีซํ้ากัน');
            window.location = 'add_std.php';
        </script>
        ";
    }else{
        $insert = mysqli_query($conn,"INSERT INTO users(number_std,user_name,password,class,deparment,photo_user,phone,status) 
                                    VALUES('$number_std','$user','$pass','$class','$d_partment','$photo','$phone','$status')");
        if($insert){
            echo "
                <script>
                    alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
                    window.location = 'list_std.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('เพิ่มข้อมูลล้มเหลว');
                    window.location = 'add_std.php';
                </script>
            ";
        }
    }
    mysqli_close($conn);
?>