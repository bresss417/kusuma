<?php
include('../data/conf.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
      <script>
        alert('pless login now!');
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
    <?php require_once('../data/link.php'); ?>
    <title>update</title>
    <style>
         .row.heading h2 {
            color:#337ab7;
            font-size: 32.32px;
            font-weight: 400;
            text-align: center;
            flot:left;
            margin: 0;
            padding-bottom: 20px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<nav class="mb-6 navbar navbar-expand-lg navbar-dark cyan mt-1">
    &nbsp;&nbsp;&nbsp;<a class="navbar-brand font-bold mt-1" href="index.php">
        <i class="fa fa-home" aria-hidden="true" style="font-size: 180%; color:black;"></i> 
         <span class="sr-only">(current)</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="">
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
<?php
    $sql = "SELECT * FROM users WHERE id='".$_GET['id']."' ";
    $up_std = mysqli_query($conn,$sql) or die(mysqli_error());
    while($row = mysqli_fetch_assoc($up_std)){
?>
<div class="container">
    <div class="row text-center col-md-12" style="height: 429px;">
        <div class="container">
            <div class="card mt-4" style="color: #999999;">
                <form class="form-signin" action="chk_up_std.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-12">
                        <div class="row heading heading-icon">
                            <h2>update student</h2>
                        </div>
                        <div class="row mt-auto col-md-12">
                            <div class="col-4">
                                <input type="file" name="image" class="form-control" value="<?php echo $row['photo_user'] ?>">
                                <button type="button" class="btn btn-info btn-sm" id="add_image">เลือกรูปภาพ</button>
                                <div class="mb-2 col-12">
                                    <img src="../photo_users/<?php echo $row['photo_user']; ?>" alt="" id="preview_image" class="img-fluid">
                                </div>
                                <button type="button" class="btn btn-info btn-sm" id="edit_image">แก้ไขรูปภาพ</button>
                                <button type="button" class="btn btn-danger btn-sm" id="delete_image">ลบรูปภาพ</button>
                            </div>
                            <div class="col-4 text-sm-center col-sm-12 text-md-left col-md-4 mt-4">
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">รหัส น.ศ :
                                    <input type="text" class="col-md-6 default" name="num_std" value="<?php echo $row['number_std']; ?>" id="exampleForm2" required />
                                </label> 
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">ชื่อ น.ศ :
                                    <input type="text" class="col-md-6 default" name="user" value="<?php echo $row['user_name']; ?>" id="exampleForm2" required />
                                </label> 
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">เบอร์โทร :
                                    <input type="text" class="col-md-7 default" name="phone" value="<?php echo $row['phone']; ?>" id="exampleForm3" required /> 
                                </label>
                            </div>
                            <div class="col-4 text-sm-center col-sm-12 text-md-left col-md-4 mt-4">
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">password :
                                    <input type="text" class="col-md-6 default" name="pass" value="<?php echo $row['password']; ?>" id="exampleForm2" required />
                                </label> 
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">ชั่น :
                                    <input type="text" class="col-md-3 default" name="class" value="<?php echo $row['class']; ?>" id="exampleForm2" required />
                                </label>
                                <label class="product-name" style="color: rgb(6, 176, 228);font-width:30px;">แผนก :
                                    <input type="text" class="col-md-7 default" name="d_partment" value="<?php echo $row['deparment']; ?>" id="exampleForm3" required /> 
                                </label>
                                <button type="submit" class="ml-3 col-10 btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    &nbsp;ยืนยันupdate
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<script src="../js/add_img.js"></script>
</body>
</html>