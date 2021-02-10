<?php
    $data = $db->query('SELECT * FROM user WHERE id="'.$_GET['id'].'"');
    $row = $data->fetch_assoc()
?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header ">
          <h5 class="card-title">Update Password User</h5>
        </div>
        <div class="card-body ">
            <form action="pages/user/user_proses.php?aksi=update_password&id=<?= $_GET['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Password Baru</label>
                    <input id="inputText3" name="password" type="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>