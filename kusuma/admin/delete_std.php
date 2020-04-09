<?php
include('../data/conf.php');
    $id = $_GET['id'];
    $delete = mysqli_query($conn,"DELETE FROM users WHERE id='$id' LIMIT 1");
    if($delete){
        echo "
        <script>
            alert('ลบเรียบร้อยแล้ว');
            window.location = 'list_std.php';
        </script>
    ";
    }else{
        echo "
        <script>
            alert('เกิดขอผิดพลาด ไม่สามารถลบได้');
            window.location = 'list_std.php';
        </script>
    ";  
    }
    mysqli_close($conn);
?>