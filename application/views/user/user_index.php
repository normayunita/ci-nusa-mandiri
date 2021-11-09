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
    <?php foreach($AllData as $row) { ?> 
    <tr>
        <td><?= $row->nama; ?></td>
        <td><?= $row->email; ?></td>
        <td><?= $row->image; ?></td>
        <td><?= $row->role_id; ?></td>
        <td><?= $row->is_active; ?></td>
        <td><?= $row->tanggal_input; ?></td>
        <td>
          <a href="<?= base_url("user-update/".$row->id); ?>">Ubah</a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>