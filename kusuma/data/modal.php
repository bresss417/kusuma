<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border:3px solid rgb(165, 8, 238); border-radius:10px;">
      <div class="modal-header text-center">
        <h5 class="text-uppercase font-weight-normal">add equetment sports</h5>
        <button type="button" class="close ml-auto col-md-3" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add_sports.php" method="post" enctype="multipart/form-data" class="form">
       
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
            </div>
            <div class="col-md-10 ml-5">
                <div class="form-group">              
                    <input type="text" class="form-control mb-4" name="sports_name" placeholder="ชื่อ อุปกรณ์ กีฬา">
                </div>
            </div>
            <div class="co-md-12 text-center">
                <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                &nbsp;เพิ่มรายการ
                </button>
            </div>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>