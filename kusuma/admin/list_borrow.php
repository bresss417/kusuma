<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION["users"])){
    echo "
        <script>
            alert('your login now');
            window.location = '../index.php';
        </script>
    ";
}else{
    $x = 1;
    $sql = "SELECT * FROM borrow_list INNER JOIN e_quipment ON borrow_list.q_id = e_quipment.e_id
            LEFT JOIN users ON users.id = borrow_list.u_id";
    $borrow = mysqli_query($conn,$sql) or die(mysqli_error());
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
<nav class="mb-6 navbar navbar-expand-lg navbar-dark cyan mt-1">
    <a class="navbar-brand font-bold mt-1" href="index.php">
        <i class="fa fa-home" aria-hidden="true" style="font-size: 150%; color:black;"></i> 
        Home <span class="sr-only">(current)</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <div class="collapse navbar-collapse" id="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="list_std.php" class="nav-link">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;รายชื่อ นักศึกษา
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;รายการ ยืม
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
                <li class="nav-item active" style="color:whitesmoke;margin-top:15px;">
                    <p class="" style="font-family: Arial, Helvetica, sans-serif;color:yellow" >
                        <?php echo $_SESSION["users"]["user_name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </li>
                <li class="nav-item ">
                    <a class="btn btn-warning btn-sm" href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        logout <span class="sr-only">(current)</span>
                    </a>
                </li>
        </ul>
    </div>
</nav>
<div class="container col-12">
    <div class="card shoppining-cart mt-2">
        <div class="card-body">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>รายชื่อ <b>ผู้ที่ยืม</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>users name</th>
                        <th>รหัส-นักศึกษา</th>
                        <th>ชั้น-แผนก</th>
                        <th>phone</th>
                        <th>ชื่อ-อุปกรณ์</th>
                        <th>จำนวน</th>
                        <th>วันที่ยืม</th>
                        <th>สถานะ</th>
                        

                    </tr>
                </thead>
<?php   while($x <= $rows = mysqli_fetch_assoc($borrow)){     ?>
                <tbody>
                    <tr>
                        <td scope="row">
                          <b> <?php echo $x; ?> </b>
                        </td>
                        <td>
                            <a href="#">
                                <img src="../photo_users/<?php echo $rows['photo_user']; ?>" class="avatar" alt="" srcset="">
                                <?php echo $rows['user_name']; ?>
                            </a>
                        </td>
                        <td>
                           <b> <?php echo $rows['number_std']; ?> </b>
                        </td>
                        <td>
                            <?php echo $rows['class']; ?><br>
                           &nbsp; <?php echo $rows['deparment']; ?>
                        </td>
                        <td>
                           <b> <?php echo $rows['phone']; ?> </b>
                        </td>
                        <td>
                            <a href="#">
                                <img src="../photo_img/<?php echo $rows['photo']; ?>" class="avatar" alt="" srcset="">
                                <?php echo $rows['name']; ?>
                            </a>
                        </td>
                        <td>
                          <b> <?php echo $rows['Qty']; ?> : ชิ้น </b>
                        </td>
                        <td>
                           <b> <?php echo $rows['date_now']; ?> </b>
                        </td>
                        <td>
                           <b> <?php echo $rows['status_borrow']; ?></b>
                        </td>
<?php
$fuckking = $rows['status_borrow'];
$prayut = "ยังไม่ได้คืน";
   if($fuckking == $prayut){
?>
                        <td>
                            <form action="up_borrow.php?borrow_id=<?php echo $rows['borrow_id']; ?>" method="post">
                                <input type="hidden" name="night" value="คืนแล้ว">
                                <input type="submit" class="btn btn-success btn-sm" value="ยืนยัน-กดคืน">
                            </form>
                        </td>
<?php 
    }else{
                echo "
                        <td>
                            <p class='btn btn-sm btn-outline-warning'>
                                ให้userลบ
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
?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
?>