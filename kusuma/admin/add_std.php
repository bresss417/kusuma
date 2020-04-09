<?php
include('../data/conf.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index_admin.css">
    
    <?php require_once('../data/link.php'); ?>
    <title>Document</title>
    <style>
        .row.heading h2 {
            color:#337ab7;
            font-size: 42.42px;
            line-height: 75px;
            font-weight: 400;
            text-align: center;
            flot:left;
            margin: 0 0 20px;
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
    <div class="container">
        <div class="row text-center col-md-8" style="height: 429px;">
            <div class="container">
                <div class="card mt-4" style="color: #999999;">
                <div class="row heading heading-icon">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h2>add student</h2>
                </div>
                    <form class="form-signin" action="chk_add_std.php" method="post" enctype="multipart/form-data" role="form">
                        <div class="col-md-12">
                            <div class="row mt-auto col-md-12">
                                <div class="col-12 text-center">
                                    <input type="file" name="image" class="form-control">
                                    <button type="button" class="btn btn-info btn-sm" id="add_image">เลือกรูปภาพ</button>
                                    <div class="mb-2 col-12">
                                        <img src="" alt="" id="preview_image" class="img-fluid">
                                    </div>
                                    <button type="button" class="btn btn-info btn-sm" id="edit_image">แก้ไขรูปภาพ</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delete_image">ลบรูปภาพ</button>
                                </div>
                            
                                <div class="col-xs-6 col-sm-6 col-md-6" style="margin">
                                    <div class="form-group">
			                            <input type="text" name="name" class="form-control input-sm" placeholder="ชื่อ">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="last" class="form-control input-sm" style="" placeholder="นามสกุล">
			                        </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="number_std" class="form-control input-sm" style="" placeholder="รหัสประจำตัว">
			                        </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="pass" class="form-control input-sm" style="" placeholder="รหัสผ่าน">
			                        </div>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <p style="color:black;">ชั่น :</p>
                                </div>
                                <div class="col-md-3 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="class" class="form-control input-sm" style="">
			                        </div>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <p style="color:black;">แผนก :</p>
                                </div>
                                <div class="col-md-4 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="d_partment" class="form-control input-sm" style="">
			                        </div>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <p style="color:black;">เบอร์โทร :</p>
                                </div>
                                <div class="col-md-8 mr-auto" >
			    		            <div class="form-group">
			    	                    <input type="text" name="phone" class="form-control input-sm" style="">
			                        </div>
                                </div>
                             </div>
                             <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="ตกลง"> 
                             </div>
                             <br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
<script src="../js/add_img.js"></script>
</body>
</html>