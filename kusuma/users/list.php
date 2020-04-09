<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
        <script>
            alert('pless your login ...');
            window.location = '../index.php';
        </script>
    ";
    exit();
}
$sql = "SELECT * FROM borrow_list
        INNER JOIN e_quipment ON borrow_list.q_id = e_quipment.e_id
        LEFT JOIN users ON users.id = borrow_list.u_id";
$l_borrow = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table_borrow.css">
    <?php require('../data/link.php'); ?>
    <title>list borrow</title>
</head>
<body>
<nav class="mb-6 navbar navbar-expand-lg navbar-dark purple mt-1">
    <div class="container">
        <a class="navbar-brand font-bold mt-1" href="#" style="color: #8efacd;">
            <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 150%; color:#8efacd;mrgin-top:15px"></i>
            ระบบยื่ม-คืนอุปกรณ์กีฬา <span class="sr-only">(current)</span>
        </a>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div class="collapse navbar-collapse" id="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i>
                        &nbsp;หน้าหลัก
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        &nbsp;รายการยืม
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
<?php if(isset($_SESSION["users"])){ ?>
                <li class="nav-item active" style="color:whitesmoke;">
                    <img src="../photo_users/<?php echo $_SESSION['users']['photo_user']; ?>" width="50" height="50" style="border-radius:100%">
                </li>&nbsp;&nbsp;
                <li class="nav-item active" style="color:whitesmoke;margin-top:10px;">
                    <p class="" style="font-family: Arial, Helvetica, sans-serif;color:yellow" >
                        <?php echo $_SESSION["users"]["user_name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </li>
                <li class="nav-item ">
                    <a class="btn btn-info btn-sm" href="../admin/logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        logout <span class="sr-only">(current)</span>
                    </a>
                </li>
<?php }  ?>
            </ul>
        </div>
    </div>
</nav> 
<div class="container col-10">
    <div class="card shoppining-cart mt-2">
        <div class="card-body">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>รายชื่อ <b>อุปกรณ์ที่ยืม</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead class="">
                    <tr>
                        <th>#</th>
                        <th>ชื่อ-อุปกรณ์</th>
                        <th>จำนวน</th>
                        <th>วันที่ยืม</th>
                        <th>ผู้ให้ยืม</th>
                        <th>สถานะ</th>
                        
                    </tr>
                </thead>
<?php
if(isset($_SESSION['users'])){
    $id_tb_user = $_SESSION['users']['id']; //variable id van table users
    $x = 1;
    while($x <= $rows = mysqli_fetch_array($l_borrow)){
        $u_id = $rows['u_id'];
        if($id_tb_user == $u_id){
?>
                <tbody>
                   <tr>
                        <td scope="row">
                            <?php echo $x; ?>
                        </td>
                        <td>
                            <a href="#">
                                <img src="../photo_img/<?php echo $rows['photo']; ?>" class="avatar" alt="" srcset="">
                                <?php echo $rows['name']; ?>
                            </a>
                        </td>
                        <td>
                           <b><?php echo $rows['Qty']; ?> : ชิ้น </b>
                        </td>
                        <td>
                           <b> <?php echo $rows['date_now']; ?> </b>
                        </td>
                        <td>
                           <b> <?php echo $rows['len_der']; ?> </b>
                        </td>
                        <td>
                           <b> <?php echo $rows['status_borrow']; ?> </b>
                        </td>
<?php
$fuckking = $rows['status_borrow'];
$prayut = "ยังไม่ได้คืน";
   if($fuckking != $prayut){
?>
                        <td class="">
                            <a href="d_lete.php?borrow_id=<?php echo $rows['borrow_id']; ?>" class="btn btn-sm btn-outline-danger"
                            onClick="return confirm('ถ้าเกิดหายควรรับผิดชอบด้วยนัห นี้เป็นหลักฐานว่าคุนคืนเเล้ว คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');">
                                <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;ลบ
                            </a>
                        </td>
<?php 
    }else{
                echo "
                        <td class=''>
                            <p class='btn btn-sm btn-outline-info'>
                            <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                                ลบไม่ได้
                            </p>
                        </td>
                ";
    }
?>
                   </tr>
                </tbody>
<?php
        $x++;
        }
    }
}
?>
            </table>
        </div>
    </div>
</div>  
</body>
</html>