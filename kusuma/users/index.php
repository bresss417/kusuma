<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
        <script>
            alert('pless your login');
            window.location = '../index.php';
        </script>
    ";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../data/link.php'); ?>
    <title>hone page</title>
    <style>
        .card .heading h3 {
            color:#337ab7;
            font-size: 42.42px;
            line-height: 65px;
            font-weight: 400;
            text-align: center;
            margin: 0;
            padding-bottom: 20px;
        }
    </style>
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
                    <a href="#" class="nav-link">
                        <i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i>
                        &nbsp;หน้าหลัก
                    </a>
                </li>
                <li class="nav-item">
                    <a href="list.php" class="nav-link">
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
<div class="container">
  <div class="card shopping-cart mt-2">
    <div class="row heading heading-icon">
        &nbsp;&nbsp;&nbsp;&nbsp;<h3>เลือกอุปกรณ์ที่ต้องการยืม</h3>
    </div>
    <div class="card-body">
<?php
    $e_quipment = mysqli_query($conn,"SELECT * FROM e_quipment") or die(mysqli_error());
        while($rows = mysqli_fetch_assoc($e_quipment)){
?>
      <form action="chk_borrow.php" method="post" enctype="multipart/form-data">
<?php if(isset($_SESSION["users"])){ ?>
            <input type="hidden" name="u_id" value="<?php echo $_SESSION["users"]["id"]; ?>">
            
<?php } ?>
            <input type="hidden" name="q_id" value="<?php echo $rows['e_id']; ?>">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-2 text-center">
                <img class="img-responsive" src="../photo_img/<?php echo $rows['photo']; ?>" alt="prewiew" width="120" height="80" style="border:3px solid rgb(6, 176, 228);border-radius:10px;">
            </div>
            <div class="col-6 text-sm-center col-sm-12 text-md-left col-md-2 mt-4">
                <h4 class="product-name" style="color: rgb(6, 176, 228);"><strong><?php echo $rows['name']; ?></strong></h4>
            </div> 
            <div class="col-2 text-sm-center col-sm-12 text-md-left col-md-2 mt-4">
                 <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">จำนวน :<input type="number" class="col-md-4 default" name="Qty" placeholder="" id="exampleForm2" required /></label>  
            </div> 
            <div class="col-4 text-sm-center col-sm-8 text-md-left col-md-5 mt-4">
                 <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">ผู้ให้ยืม :<input type="text" class="col-md-6 default" name="lender" placeholder="" id="exampleForm2" required /></label>  
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        &nbsp;ยืนยัน-กดยืม
                    </button>
            </div>
        </div>
      </form>
      <hr>
<?php   }   ?>
    </div>
  </div>
</div>
</body>
</html>