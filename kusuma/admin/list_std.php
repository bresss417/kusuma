<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
        <script>
            alert('login now !');
            window.location = '../index.php';
        </script>
    ";
}
$std = mysqli_query($conn,"SELECT * FROM users WHERE status='user'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/list_std.css">
    <?php require_once('../data/link.php'); ?>
    <title>list name student</title>
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
                <a href="#" class="nav-link">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;รายชื่อ นักศึกษา
                </a>
            </li>
            <li class="nav-item">
                <a href="list_borrow.php" class="nav-link">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;รายการ ยืม
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
<?php if(isset($_SESSION["users"])){ ?>
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
<?php }else{ echo "null"; } ?>
        </ul>
    </div>
</nav>
<section class="our-webcoderskull padding-lg">
    <div class="container">
        <div class="d-flex mt-3 ml-auto">
        <!-- <a href="add_sports.php" class="btn btn-outline-success mr-5"> + เพิ่มรายการ</a> -->
            <a href="add_std.php" class="btn btn-outline-success">
                + เพิ่มรายการ
            </a>
        </div>
        <ul class="row">
<?php while($rows = mysqli_fetch_assoc($std)){  ?>
            <li class="col-12 col-md-6 col-lg-3">
                <div class="cnt-block equal-hight" style="height: 429px;">
                    <figure><img src="../photo_users/<?php echo $rows['photo_user']; ?>" class="img-responsive" alt=""></figure>
                    <h3><a><?php echo $rows['number_std']; ?></a></h3>
                    <p>ชื่อ-สกุล : <?php echo $rows['user_name']; ?></p>
                    <p class="mt-auto">เบอร์โทร : <?php echo $rows['phone']; ?></p>
                    <p>ชั่น : <?php echo $rows['class']; ?></p>
                    <p>แผนก : <?php echo $rows['deparment']; ?></p>
                    <div class="col-md-12">
                        <a href="up_std.php?id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">เเก้ไข</a>
                        <a href="delete_std.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm">ลบ</a>
                    </div> 
                </div>
            </li>
<?php  }  ?>
        </ul>
    </div>
</section>
</body>
</html>