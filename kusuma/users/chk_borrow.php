<?php
include('../data/conf.php');
session_start();
    $u_id = $_POST['u_id'];
    $q_id = $_POST['q_id'];
    $Qty = $_POST['Qty'];
    $lender = $_POST['lender'];
    $status = "ยังไม่ได้คืน";
    $date = date('Y-m-d');
    $sql = "INSERT INTO borrow_list(u_id,q_id,Qty,date_now,status_borrow,len_der)
             VALUES('$u_id','$q_id','$Qty','$date','$status','$lender')";
    $ins_borrow = mysqli_query($conn,$sql) or die(mysqli_error());
    if($ins_borrow){
        echo "
            <script>
                alert('ทำการยืมเรียบร้อย');
                window.location = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('เกิดข้อผิดพลาด ทำการยืมล้มเหลว');
                window.location = 'index.php';
            </script>
        ";
    }
?>