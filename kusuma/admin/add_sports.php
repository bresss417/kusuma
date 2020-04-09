<?php
include('../data/conf.php');
session_start();
    $exe = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $new_img = 'img_' .uniqid(). ".".$exe;
    $img_path = "../photo_img/";
    $upload_path = $img_path.$new_img;
    $success = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);
    if($success == FALSE){
        $calback = array(
            'status' => 404,
            'msg' => 'upload image false'
        );
        exit();
    }
    $photo = $new_img;
    $sports_name = $_POST['sports_name'];
    $sql = "INSERT INTO e_quipment(name,photo) VALUES('$sports_name','$photo')";
    $que = mysqli_query($conn,$sql);
    if($que){
        echo "  
        <script>
            alert('เพื่ม รายการเรียบร้อยแล้ว');
            window.location = 'index.php';
        </script>
        ";
    }else{
        echo "  
        <script>
            alert('เพื่ม รายการล้มเหลว');
            window.location = 'index.php';
        </script>
        ";
    }
    mysqli_close($conn);
?>