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
    <?php require_once('../data/link.php'); ?>
    <link rel="stylesheet" href="../css/update.css">
    <script src="../js/add_img.js"></script>
    <title>Document</title>
</head>
<body>
<nav class="mb-6 navbar navbar-expand-lg navbar-dark cyan mt-1">
    <a class="navbar-brand font-bold mt-1" href="index.php">
        <i class="fa fa-home" aria-hidden="true" style="font-size: 150%; color:black;"></i> 
        Home <span class="sr-only">(current)</span>
    </a>
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
    $show = mysqli_query($conn,"SELECT * FROM e_quipment WHERE e_id='".$_GET['e_id']."' ") or die(mysqli_error());
        while($rows = mysqli_fetch_assoc($show)){
?>
<div class="container">
    <div class="row text-center col-md-5" style="margin-left:300px">
        <div class="container" id="formContaine">
          <div class="card mt-5" style="backgroun-color:blanchedalmond;">
            <form class="form-signin" id="login" role="form" action="up_equipment.php?e_id=<?php echo $_GET['e_id']; ?>" method="post" enctype="multipart/form-data">
              <div class="row  mt-5 col-md-12">
                <div class="col-12 text-center">
                    <input type="file" name="image" class="form-control" value="<?php echo $rows['photo']; ?>">
                    <button type="button" class="btn btn-info btn-sm" id="add_image">เลือกรูปภาพ</button>
                    <div class="mb-2 col-12">
                      <img src="../photo_img/<?php echo $rows['photo']; ?>" alt="" id="preview_image" class="img-fluid">
                    </div>
                    <button type="button" class="btn btn-info btn-sm" id="edit_image">แก้ไขรูปภาพ</button>
                    <button type="button" class="btn btn-danger btn-sm" id="delete_image">ลบรูปภาพ</button>
                </div>
                <div class="col-md-10 ml-5">
                  <div class="form-group">              
                      <input type="text" class="form-control mb-4" name="sports_name" value="<?php echo $rows['name']; ?>">
                  </div>
                  <div class="form-group"> 
                    <button type="submit" class="btn btn-success">
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
</body>
</html>