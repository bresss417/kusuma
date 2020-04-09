<?php
include('../data/conf.php');
    $id = $_GET['id'];
    $ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    if($ext !=''){
        $new_img_name = 'img_'.uniqid().".".$ext;
        $image_path = "../photo_users/";
        $upload_path = $image_path.$new_img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
        $photo = $new_img_name;
    }else{
        $photo = $_POST["image"];;
    }
    $num_std = $_POST['num_std'];
    $user = $_POST['user'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $class = $_POST['class'];
    $d_partment = $_POST['d_partment'];
    $status ="user";

    $chk = mysqli_query($conn, "SELECT * FROM users WHERE number_std ='$num_std' ") or die(mysqli_error());
        if($chk>1){
            echo "
                <script>
                    alert('รหัส น.ศ มีซํ้ากัน');
                    window.location = 'list_std.php';
                </script>
            ";
        }else{
            $sql = mysqli_query($conn,"UPDATE users SET
             number_std='$num_std',
             user_name='$user',
             password='$pass',
             class='$class',
             deparment='$d_partment',
             photo_user='$photo',
             phone='$phone',
             status='$status'
             WHERE id='$id' ");
                if($sql){
                    echo "
                    <script>
                        alert('แก้ไขรายชื่อ น.ศ เรียบร้อยแล้ว');
                        window.location = 'list_std.php';
                    </script>
                    ";
                }else{
                    echo "
                    <script>
                        alert('มีข้อผิดพลาด การupdateล้มเหลว');
                        window.location = 'list_std.php';
                    </script>
                ";
                }
        }


?>