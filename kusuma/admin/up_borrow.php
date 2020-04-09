<?php
include('../data/conf.php');
$night = $_POST['night'];
$borrow_id = $_GET['borrow_id'];
$update = mysqli_query($conn,"UPDATE borrow_list SET status_borrow='$night' WHERE borrow_id='$borrow_id' ")
        or die(mysqli_error());
    if($update){
        echo "
            <script>
                alert('ยืนยัน คืนเรียบร้อยแล้ว');
                window.location = 'list_borrow.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('ยืนยัน คืนล้มเหลว มีข้อผิดพลาด');
                window.location = 'list_borrow.php';
            </script>
        ";
    }
?>
