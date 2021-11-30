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

        <?php

        //Untuk Role
          foreach ($RoleData as $r) {
            if ($r->id == $row->role_id) {
              echo "<td>" . $r->role . "</td>";
            }
          }

        //Untuk Status Aktivaso
        if ($row->is_active == "1") {
          echo "<td>Aktif</td>";
        }else{
          echo "<td>Non-Aktif</td>";
        }

        ?> 
        <td><?= $row->tanggal_input; ?></td>
        <td>
          <a href="<?= base_url("user-update/".$row->id); ?>">Ubah</a> ||
          
          <a href="<?= base_url("user-delete/".$row->id); ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>