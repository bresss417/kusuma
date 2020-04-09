<?php
include('../data/conf.php');
    $id = $_GET['borrow_id'];
    $delete = mysqli_query($conn,"DELETE FROM borrow_list WHERE borrow_id='$id' LIMIT 1");
    if($delete){
        echo "
        <script>
            alert('ลบเรียบร้อยแล้ว');
            window.location = 'list.php';
        </script>
    ";
    }else{
        echo "
        <script>
            alert('เกิดขอผิดพลาด ไม่สามารถลบได้');
            window.location = 'list.php';
        </script>
    ";  
    }
    mysqli_close($conn);
?>