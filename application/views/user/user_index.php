<a href="<?= base_url('user-create') ?>"><button type="button" class="btn btn-primary">Add New<span class="material-icons">
add
</span></button></a>

<hr><br>

<div class="table-responsive">
<table class="table">
  <thead class="table-dark">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
        <th>Status</th>
        <th>Tanggal Input</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>      
    <tr>
        <td><?= $nama; ?></td>
        <td><?= $email; ?></td>
        <td><?= $image; ?></td>
        <td><?= $role_id; ?></td>
        <td><?= $is_active; ?></td>
        <td><?= $tanggal_input; ?></td>
        <td>Edit</td>
    </tr>
  </tbody>
</table>
</div>