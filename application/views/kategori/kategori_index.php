<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" onclick="showModalAdd()">
  Tambah <?= $headertitle ?>
</button>

<hr><br>

<div class="table-responsive">
<table class="table">
  <thead class="table-dark">
    <tr>
        <th width="100px">#</th>
        <th>Nama Kategori</th>
        <th width="20%">Action</th>
    </tr>
  </thead>
  <tbody id="show_data">
  </tbody>
</table>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $headertitle ?> <span id="kategoriID"></span></h5>

        <button type="button" class="close"   onclick="closeModal()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
                <div class="mb-3 row">
                        <label for="staticName" class="col-sm-4 col-form-label">Nama Kategori</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="staticName" name="nama_kategori" value="<?= set_value('nama_kategori'); ?>" >
                        </div>
                </div> 
      </div>
      <div class="modal-footer">
        <!-- <button type="button" id="btnBatal" class="btn btn-secondary"  onclick="closeModal()">Batal</button> -->
        <!-- <button type='submit' id="btnSimpan" class="btn btn-primary" onclick="onSaveData()">Simpan</button> -->
        <input id="btnBatal" type="button"  class="btn btn-secondary" onclick="closeModal()" value="Batal">
        <input id="btnSimpan" type="button"  class="btn btn-primary" onclick="onSaveData()" value="Simpan">
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function (){
        LoadData();
    });

    function LoadData() {
        $.ajax({
            url: '<?= site_url("kategori-all"); ?>',
            type: "GET",
            dataType: "json",
            beforeSend: function (xhr) {
                $('#show_data').html("loading...");
                $('body').css('cursor', 'wait');
            },
            success: function(data) {
                $('#show_data').html(data.AllData);
                $('body').css('cursor', 'default');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
                $('body').css('cursor', 'default');
            }
        });
    }

    function onUpdate(id) {
      showModalUpdate();
      const changeInputNameValue = document.getElementById('data-delete_' + id).getAttribute('data-kategoriName');
      document.getElementById("kategoriID").innerHTML = id;
      document.getElementById("staticName").value = changeInputNameValue;
    }

    function onDelete(id) {

      var answer = window.confirm("Yakin mau hapus?");
      if (answer) {
        
        const formData = new FormData();
        formData.append('id', id);

        $.ajax({
              url: '<?= site_url("kategori-delete"); ?>',
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              beforeSend: function (xhr) {
                  $('#show_data').html("loading...");
                  $('#btnSimpan').button('loading...');
                  $('body').css('cursor', 'wait');
              },
              success: function(json) {
                const data = JSON.parse(json);
                if(data.response == 200)
                {
                  alert(data.message);
                  LoadData();
                }else{
                  alert(data);
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.responseText);
                  $('body').css('cursor', 'default');
              }
          });
      }
      else {
        LoadData();
      }
    }

    function onSaveData() {

      const checkBtnName = document.getElementById('btnSimpan').getAttribute('value');

      if (checkBtnName == "Simpan") {
        const nama_kategori		= $('#staticName').val().trim();
        const formData = new FormData();
        formData.append('nama_kategori', nama_kategori);

        $.ajax({
              url: '<?= site_url("kategori-create"); ?>',
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              beforeSend: function (xhr) {
                  $('#show_data').html("loading...");
                  $('#btnSimpan').button('loading...');
                  $('body').css('cursor', 'wait');
              },
              success: function(json) {
                const data = JSON.parse(json);
                if(data.response == 200)
                {
                  $('#btnSimpan').button('Simpan');
                  $('#staticName').focus().val('');
                  LoadData();
                }else{
                  alert(data);
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.responseText);
                  $('body').css('cursor', 'default');
              }
          });
      }
      else{
        const kategoriID = document.getElementById('kategoriID').textContent;
        const nama_kategori		= $('#staticName').val().trim();
        const formData = new FormData();
        formData.append('nama_kategori', nama_kategori);
        formData.append('id', kategoriID);

        $.ajax({
              url: '<?= site_url("kategori-update"); ?>',
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              beforeSend: function (xhr) {
                  $('#show_data').html("loading...");
                  $('#btnSimpan').button('loading...');
                  $('body').css('cursor', 'wait');
              },
              success: function(json) {
                const data = JSON.parse(json);
                if(data.response == 200)
                {
                  alert(data.message);
                  closeModal();
                  LoadData();
                }else{
                  alert(data);
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  alert(xhr.responseText);
                  $('body').css('cursor', 'default');
              }
          });
      }

      
    }


// Show and Close Modal

    function showModalAdd() {
      $('#myModal').modal('show');
      $('#staticName').focus().val('');

      getSpanId = document.getElementById("kategoriID");
      getSpanId.style.display = "block";
      document.getElementById("kategoriID").innerHTML = "";
      document.querySelector('#btnSimpan').value = 'Simpan';
    }

    function showModalUpdate() {
      $('#myModal').modal('show');
      $('#staticName').focus().val('');

      getSpanId = document.getElementById("kategoriID");
      getSpanId.style.display = "show";
      document.querySelector('#btnSimpan').value = 'Update';
    }

    function closeModal() {
      $('#myModal').modal('toggle');
    }

    
</script>