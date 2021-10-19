<a href="<?= base_url('users') ?>"><button type="button" class="btn btn-primary"><span class="material-icons">
arrow_back
</span> Back</button></a>

<hr><br>

<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>


<?= form_open('user-create'); ?>
  <div class="mb-3 row">
        <label for="staticFullName" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="staticFullName" name="nama" value="<?= set_value('nama'); ?>" >
        </div>
  </div>
  <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="staticEmail" name="email" value="<?= set_value('email'); ?>" >
        </div>
  </div>
  <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
  </div>
  <div class="mb-3 row">
        <label for="staticRole" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
            <option selected>Administrator</option>
            <option value="1">Member</option>
            <option value="2">Non-Member</option>
        </select>
        </div>
  </div>
  <div class="mb-3 row">
        <label for="staticStatus" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
        <select class="form-select" size="2" aria-label="size 3 select example"  name="status">
            <option selected value="1">Active</option>
            <option value="0">Non-Active</option>
        </select>
        </div>
  </div>
  <div class="mb-3 row">
        <label for="staticImage" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
        <input class="form-control" type="file" id="staticEmail" name="image">
        </div>
  </div>

  
  <div class="mb-3 row">
        <label for="staticImage" class="col-sm-3 col-form-label">
        <button class="btn btn-primary" type="submit">Create <span class="material-icons">
save
</span></button>
        </label>
        <div class="col-sm-9"></div>
  </div>

</form>