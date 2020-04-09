<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
        <script>
        alert('to login');
        window.location = '../index.php';
        </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index_admin.css">
    <?php require('../data/link.php'); ?>
    <title>admin home</title>
</head>
<body>
<nav class="mb-6 navbar navbar-expand-lg navbar-dark cyan mt-1">
    <a class="navbar-brand font-bold mt-1" href="#">
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

<div class="container">
    <div class="d-flex mt-3">
        <!-- <a href="add_sports.php" class="btn btn-outline-success mr-5"> + เพิ่มรายการ</a> -->
        <button type="button" class="btn btn-outline-success mr-5" data-toggle="modal" data-target="#exampleModalCenter">
            + เพิ่มรายการ
        </button>
    </div>
   <div class="card shopping-cart mt-2"> 
            <div class="card-body">
<?php

    $e_quipment = mysqli_query($conn,"SELECT * FROM e_quipment") or die(mysqli_error());
        while($rows = mysqli_fetch_assoc($e_quipment)){
    
?>
                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../photo_img/<?php echo $rows['photo']; ?>" alt="prewiew" width="120" height="80" style="border:3px solid rgb(6, 176, 228);border-radius:10px;">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6 mt-4">
                            <h4 class="product-name" style="color: rgb(6, 176, 228);"><strong><?php echo $rows['name']; ?></strong></h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right mt-4 row">
                            <div class="col-2 col-sm-2 col-md-10 text-right">
                                <a href="update.php?e_id=<?php echo $rows['e_id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    update
                                </a>
                                <a href="dalete.php?e_id=<?php echo $rows['e_id']; ?>" type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    dalete
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                
<?php   }   ?>
            </div>  
        </div>
</div>

<?php require_once('../data/modal.php'); ?>
<script src="../js/add_img.js"></script>

</body>
</html>
