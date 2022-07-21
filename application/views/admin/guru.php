      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php 
  if ($this->session->flashdata('flash')) {
    echo $this->session->flashdata('flash');
  }
 ?>
<!-- <a href="<?=base_url('admin/tambahguru')?>" class="btn btn-block btn-primary" id="tomboltambah" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a> -->
<button id="btnAdd" data-toggle="modal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</button>
<br>
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th></th>
    <th width="5%">No.</th>
    <th>NIP</th>
    <th>Nama Guru</th>
    <th>No. Telp</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody id="showdata">
  	<?php if ($guru->num_rows() > 0) {
  		$no=1;
  		foreach ($guru->result_object() as $r) {

  	?>
	  <tr>
      <td width="5%">
        <p><input type="checkbox" name="guru_id[]" id="guru_<?=$r->id_guru?>" value="<?=$r->id_guru?>"></p>
      </td>
	    <td><?=$no?></td>
	    <td><?=$r->nip?></td>
	    <td><?=$r->nama?></td>
      <td><?=$r->nohp?></td>
	    <td width="10%">
        <button id="btnEdit" data-toggle="modal" class="btn btn-info item-edit" title="Ubah" data-id_guru="<?=$r->id_guru?>" data-nip="<?=$r->nip?>" data-nama="<?=$r->nama?>" data-nohp="<?=$r->nohp?>" data-email="<?=$r->email?>" data-alamat="<?=$r->alamat?>"><i class="fas fa-edit"></i></button>
        <button class="btn btn-danger item-delete" data="<?=$r->id_guru?>" title="Hapus"><i class="fas fa-trash"></i></button>
	    </td>
	  </tr>
	<?php
	$no++;
  		}
  	} else {
  	?>
  	<tr>
      <td colspan="6"><center>Data Kosong</center></td>
  	</tr>
  	<?php
  	}
  	 ?>
  </tbody>
  <tfoot>
  <tr>
    <th></th>
    <th>No.</th>
    <th>NIP</th>
    <th>Nama Guru</th>
    <th>No. Telp</th>
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
              <input type="hidden" name="id_guru" id="id_guru">
              <label for="nip">NIP</label>
                <input type="number" name="nip" id="nip" class="form-control" placeholder="NIP" value="">
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Guru">
            </div>
            <div class="form-group">
              <label for="tahun">No. Telp</label>
                <input type="number" name="nohp" id="nohp" class="form-control" placeholder="No. Telp">
            </div>
            <div class="form-group">
              <label for="tahun">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="tahun">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary"></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  $(function(){
    // TampilKelas();

    //Add New
    $('#btnAdd').click(function(){
      $('#nip').val("");
      $('#nama').val("");
      $('#nohp').val("");
      $('#email').val("");
      $('#alamat').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Guru');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var id_guru = $(this).data("id_guru");
      var nip = $(this).data("nip");
      var nama = $(this).data("nama");
      var nohp = $(this).data("nohp");
      var email = $(this).data("email");
      var alamat = $(this).data("alamat");
      $('#nip').val(nip);
      $('#nama').val(nama);
      $('#nohp').val(nohp);
      $('#email').val(email);
      $('#alamat').val(alamat);
      $('#id_guru').val(id_guru);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Edit Data Guru');
      $('#btnSave').text('EDIT');
    });


    $('#btnSave').click(function(){
      //validate form
      var nip = $('#nip').val();
      var nama = $('#nama').val();
      var nohp = $('#nohp').val();
      var email = $('#email').val();
      var alamat = $('#alamat').val();
      var id_guru = $('#id_guru').val();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (nip == "") {
          Swal.fire('NIP Harus Diisi');
        }else if (nama == "") {
          Swal.fire('Nama Harus Diisi');
        }else if (nohp == "") {
          Swal.fire('NO. HP Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Admin/tambahguru' ?>',
            data: {
              nip: nip,
              nama: nama,
              nohp: nohp,
              email: email,
              alamat: alamat,
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
              window.location="<?=base_url('Admin/Guru')?>";
            }
          });

        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Admin/ubahguru' ?>',
          data: {
            nip: nip,
            nama: nama,
            nohp: nohp,
            email: email,
            alamat: alamat,
            id_guru: id_guru,
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
            window.location="<?=base_url('Admin/Guru')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_guru = $(this).attr('data');
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
            url: '<?php echo base_url() ?>Admin/hapusguru',
            data:{id_guru:id_guru},
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
                window.location="<?=base_url('Admin/Guru')?>";
              }else{
                alert('Error');
              }
            },
            error: function(){
              Swal.fire('Guru Tercatat sebagai Wali Kelas');
              // alert('Hapus Setting Wali Kelas Terlebih Dahulu');
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
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?=$awal ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>