  <!-- /.modal -->
  <form method="POST">  
    <div class="modal fade" id="modal-secondary">
      <div class="modal-dialog">
        <div class="modal-content bg-secondary">
          <div class="modal-header">
            <h4 class="modal-title">Edit Profile</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <label>Username/Name</label>
              <input class="form-control"type="text" name="uname" value="<?php echo $uname?>">
              <br>  
              <label>Change Password</label>
              <input class="form-control"type="password" name="pword">
            </div>
            <div class="modal-footer justify-content-between">
              <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
              <button type="submit" name ="update_name"class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </form>