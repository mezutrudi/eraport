      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<button id="btnAdd" data-toggle="modal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah Data</button><br>
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th></th>
    <th width="5%">No.</th>
    <th>Nama Kelas</th>
    <th>Wali Kelas</th>
    <th>Tahun</th>
    <th width="15%">Aksi</th>
  </tr>
  </thead>
  <tbody id="showdata">
    <?php $no=1;
    foreach($kelas as $kls) {
     ?>

     <tr>
      <td></td>
      <td><?=$no?></td>
      <td><?=$kls->namakls?></td>
      <td><?=$kls->nama?></td>
      <td><?=$kls->namasemester?></td>
      <td>
        <button id="btnEdit" class="btn btn-info item-edit" data-id_kelas="<?=$kls->id_kelas?>" data-namakls="<?=$kls->namakls?>" data-id_guru="<?=$kls->id_guru?>" data-id_ta="<?=$kls->id_ta?>" title="Edit"><i class="fas fa-edit"></i> </button>
        <button class="btn btn-danger item-delete" data="<?=$kls->id_kelas?>" title="Hapus"><i class="fas fa-trash"></i> </button>
      </td>
     </tr>

    <?php $no++;
    } ?>
    
  </tbody>
  <tfoot>
  <tr>
    <th></th>
    <th>No.</th>
    <th>Nama Kelas</th>
    <th>Wali Kelas</th>
    <th>Tahun</th>
    <th>Aksi</th>
  </tr>
  </tfoot>
</table>
  <button type="button" class="btn btn-block btn-danger" style="width: 150px" id="hapusbanyak">Delete</button>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
          <form id="myForm" action="" method="post" class="form-horizontal">
            <div class="form-group">
              <input type="hidden" name="id_kelas" id="id_kelas">
              <label for="namakls">Nama Kelas</label>
                <input type="text" name="namakls" id="namakls" class="form-control" placeholder="Nama Kelas" value="">
            </div>
            <div class="form-group">
              <label for="walikelas">Wali Kelas</label>
                <select name="walikelas" id="walikelas" class="form-control">
                  <option value="">-- Pilih Wali Kelas --</option>
                <?php foreach($guru->result_object() as $s) { ?>
                  <option value="<?=$s->id_guru?>"><?=$s->nama?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <label for="tahun">Tahun Ajaran</label>
                <select name="tahun" id="tahun" class="form-control">
                  <option value="">-- Pilih Tahun Ajaran --</option>
                <?php foreach($tahun->result_object() as $s) { ?>
                  <option value="<?=$s->id_ta?>"><?=$s->namasemester?></option>
                <?php } ?>
                </select>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnSave" class="btn btn-primary"></button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
  $(function(){
    // TampilKelas();

    //Add New
    $('#btnAdd').click(function(){
      $('#namakls').val("");
      $('#walikelas').val("");
      $('#tahun').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Kelas');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var id_kelas = $(this).data("id_kelas");
      var namakls = $(this).data("namakls");
      var id_guru = $(this).data("id_guru");
      var id_ta = $(this).data("id_ta");
      $('#namakls').val(namakls);
      $('#walikelas').val(id_guru);
      $('#tahun').val(id_ta);
      $('#id_kelas').val(id_kelas);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data Kelas');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      //validate form
      var namakls = $('#namakls').val();
      var walikelas = $('#walikelas').val();
      var tahun = $('#tahun').val();
      var id_kelas = $('#id_kelas').val();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (namakls == "") {
          Swal.fire('Nama Kelas Harus Diisi');
        }else if (walikelas == "") {
          Swal.fire('Wali Kelas Harus Diisi');
        }else if (tahun == "") {
          Swal.fire('Tahun Ajaran Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Admin/tambahkelas' ?>',
            data: {
              namakls: namakls,
              walikelas: walikelas,
              tahun: tahun,
            },
            success: function(data){
              $('#myModal').modal('hide');
              Swal.fire({
                title: 'Sukses',
                text: 'Data Berhasil disimpan',
                icon: 'success',
                timer: 2000
              });
              // TampilKelas();
              window.location="<?=base_url('Admin/Kelas')?>";
            }
          });

        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Admin/ubahkelas' ?>',
          data: {
            namakls: namakls,
            walikelas: walikelas,
            tahun: tahun,
            id_kelas: id_kelas,
          },
          success: function(data){
            $('#myModal').modal('hide');
            Swal.fire({
              title: 'Sukses',
              text: 'Data Berhasil diubah',
              icon: 'success',
              timer: 2000
            });
            // TampilKelas();
            window.location="<?=base_url('Admin/Kelas')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_kelas = $(this).attr('data');
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data yang terhapus tidak dapat dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: '<?php echo base_url() ?>Admin/hapuskelas',
            data:{id_kelas:id_kelas},
            dataType: 'json',
            success: function(response){
              if(response.success){
                $('#deleteModal').modal('hide');
                // $('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                Swal.fire({
                  title: 'Sukses!',
                  text: 'Data Berhasil Terhapus',
                  icon: 'success',
                  timer: 2000
                });
                // TampilKelas();
                window.location="<?=base_url('Admin/Kelas')?>";
              }else{
                alert('Error');
              }
            },
            error: function(){
              alert('Error deleting');
            }
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire({
            title: 'Dibatalkan',
            text: 'Data Anda masih Aman :)',
            icon: 'error',
            timer: 2000
          });
        }
      });
    });

  });
</script>

  <script type="text/javascript">
    $('#hapusbanyak').click(function(){
      var kelas_id = [];
      $('input[name="kelas_id[]"]:checked').each(function(){
        var id = $(this).val();
        kelas_id.push(id_kelas);
      });
      if(kelas_id == ""){
        alert('Tidak ada Kelas yang dipilih');
      } else{
        $.ajax({
          type:'ajax',
          method:'POST',
          url:'<?=base_url("Admin/hapusbanyakkelas")?>',
          data:{id_kelas:kelas_id},
          success:function(data){
            window.location.reload();
          },
          error:function(){
            alert('Errorrrr');
          }

        });
      }
    });
  </script>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?=$awal ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>