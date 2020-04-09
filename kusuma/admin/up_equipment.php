<?php
include('../data/conf.php');
 $e_id = $_GET['e_id'];
 $ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
 if($ext !=''){
   $new_img_name = 'img_'.uniqid().".".$ext;
   $image_path = "../photo_img/";
   $upload_path = $image_path.$new_img_name;
   move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
   $photo = $new_img_name;
 }else{
   $photo = $_POST["image"];;
 }
 $name = $_POST['sports_name'];
 $sql = "UPDATE e_quipment SET name ='$name', photo='$photo' WHERE e_id='$e_id'";
 $up = mysqli_query($conn,$sql);
 if($up){
   echo "
       <script>
           alert('แก้ไขเรียบร้อยแล้ว');
           window.location = 'index.php';
       </script>
   ";
 }else{
   echo "
       <script>
           alert('การแก้ไขล้มเหลว');
           window.location = 'update.php';
       </script>
   ";
 }
?>