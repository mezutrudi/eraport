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
<a href="<?=base_url('admin/tamsis')?>" class="btn btn-block btn-primary" style="width: 150px">Tambah</a><br>
<button id="btnAdd" data-toggle="modal" class="btn btn-block btn-primary" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</button><br>
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th><input type="checkbox" name="" value=""></th>
    <th width="5%">No.</th>
    <th>NIS</th>
    <th>NISN</th>
    <th>Nama Siswa</th>
    <th width="10%">Foto</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody id="showdata">
  	<?php if ($siswa->num_rows() > 0) {
  		$no=1;
  		foreach ($siswa->result_object() as $r) {

  	?>
	  <tr>
      <td width="5%">
        <p><input type="checkbox" name="siswa_id[]" id="siswa<?=$r->id_siswa?>" value="<?=$r->id_siswa?>"></p>
      </td>
	    <td><?=$no?></td>
	    <td><?=$r->nis?></td>
	    <td><?=$r->nisn?></td>
	    <td><?=$r->nama_siswa?></td>
      <td>
        <?php 
          if (!$r->foto) {
          ?>
            <img src="<?=base_url('public/images/fotokosong.jpg')?>" alt="" width="100">
          <?php            
          } else{
            ?>
            <img src="<?=base_url('public/images/'.$r->foto)?>" alt="" width="100">
          <?php
          }
         ?>
      </td>
	    <td width="10%">
        <button id="btnEdit" class="btn btn-info item-edit" data-id_siswa="<?=$r->id_siswa?>" data-nis="<?=$r->nis?>" data-nisn="<?=$r->nisn?>" data-nama_siswa="<?=$r->nama_siswa?>" data-jk="<?=$r->jk?>" data-tempatlahir="<?=$r->tempatlahir?>" data-tgllahir="<?=$r->tgllahir?>" data-agama="<?=$r->agama?>" data-alamat="<?=$r->alamat?>" title="Edit"><i class="fas fa-edit"></i> </button>
        <button class="btn btn-danger item-delete" data="<?=$r->id_siswa?>" title="Hapus"><i class="fas fa-trash"></i></button>
        <!-- <a href="<?=base_url('admin/hasis/'.$r->id_siswa)?>" class="btn btn-danger "><i class="fas fa-trash"></i></a> -->
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
    <th width="5%">No.</th>
    <th>NIS</th>
    <th>NISN</th>
    <th>Nama Siswa</th>
    <th>Foto</th>
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
          <input type="hidden" name="id_siswa" id="id_siswa">
          <div class="row">
            <div class="col-3">
              <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS" value="">
            </div>
            <div class="col-4">
              <label for="nisn">NISN</label>
                <input type="number" name="nisn" id="nisn" class="form-control" placeholder="NISN" value="">
            </div>            
          </div>
          <div class="row">
            <div class="col-8">
              <label for="nama_siswa">Nama</label>
                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" placeholder="Nama Siswa">
            </div>
            <div class="col-4">
              <label for="jk">JK</label>
              <select name="jk" id="jk" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>            
          </div>
          <div class="row">
            <div class="col-8">
              <label for="tempatlahir">Tempat Lahir</label>
                <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Tempat Lahir">
            </div>
            <div class="col-4">
              <label for="tgllahir">Tanggal Lahir</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="tgllahir" id="tgllahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask>
              </div>
            </div>        
          </div>
          <div class="row col-12">
              <label for="agama">Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="">-- Pilih --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
              </select>       
          </div>
          <div class="row col-12">
              <label for="tahun">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
          </div><br>
          <div class="row col-12">
            <label for="foto" id="label-foto">Foto</label>
            <input type="file" name="foto" id="foto" class="col-12">
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
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()
    // TampilKelas();
    //Add New
    $('#btnAdd').click(function(){
      $('#id_anggota').val("");
      $('#nama_anggota').val("");
      $('#alamat').val("");
      $('#no_hp').val("");
      $('#email').val("");
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Tambah Data Anggota');
      $('#btnSave').text('SIMPAN');
    });
    //Edit
    $('#showdata').on('click', '.item-edit', function(){
      var id_anggota = $(this).data("id_anggota");
      var nama_anggota = $(this).data("nama_anggota");
      var alamat = $(this).data("alamat");
      var no_hp = $(this).data("no_hp");
      var email = $(this).data("email");

      $('#nama_anggota').val(nama_anggota);
      $('#alamat').val(alamat);
      $('#no_hp').val(no_hp;
      $('#email').val(email);
      $('#id_anggota').val(id_anggota;
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Ubah Data Anggota');
      $('#btnSave').text('SIMPAN');
    });


    $('#btnSave').click(function(){
      //validate form
      var nis = $('#nis').val();
      var nisn = $('#nisn').val();
      var nama_siswa = $('#nama_siswa').val();
      var jk = $('#jk').val();
      var tempatlahir = $('#tempatlahir').val();
      var tgllahir = $('#tgllahir').val();
      var agama = $('#agama').val();
      var alamat = $('#alamat').val();
      var id_siswa = $('#id_siswa').val();

      var tombol = $(this).text();

      if (tombol == 'SIMPAN') {
        if (nis == "") {
          Swal.fire('NIS Harus Diisi');
        }else if (nisn == "") {
          Swal.fire('NISN Harus Diisi');
        }else if (nama_siswa == "") {
          Swal.fire('Nama Siswa Harus Diisi');
        }else if (jk == "") {
          Swal.fire('Jenis Kelamin Harus Diisi');
        }else if (tempatlahir == "") {
          Swal.fire('Tempat Lahir Siswa Harus Diisi');
        }else if (agama == "") {
          Swal.fire('Agama Siswa Harus Diisi');
        }else if (alamat == "") {
          Swal.fire('Alamat Siswa Harus Diisi');
        }else{
          $.ajax({
            type:'POST',
            url: '<?=base_url().'Admin/tambahsiswa' ?>',
            data: {
              nis: nis,
              nisn: nisn,
              nama_siswa: nama_siswa,
              jk: jk,
              tempatlahir: tempatlahir,
              tgllahir: tgllahir,
              agama: agama,
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
              window.location="<?=base_url('Admin/Siswa')?>";
            }
          });

        }
      }else{
        $.ajax({
          type:'POST',
          url: '<?=base_url().'Admin/ubahsiswa' ?>',
          data: {
            nis: nis,
            nisn: nisn,
            nama_siswa: nama_siswa,
            jk: jk,
            tempatlahir: tempatlahir,
            tgllahir: tgllahir,
            agama: agama,
            alamat: alamat,
            id_siswa: id_siswa,
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
            window.location="<?=base_url('Admin/Siswa')?>";
          }
        });
      }
    });

    //delete- 
    $('#showdata').on('click', '.item-delete', function(){
      var id_siswa = $(this).attr('data');
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
            url: '<?php echo base_url() ?>Admin/hapussiswa',
            data:{id_siswa:id_siswa},
            dataType: 'json',
            success: function(response){
              if(response.success){
                $('#deleteModal').modal('hide');
                Swal.fire({
                  title: 'Sukses!',
                  text: 'Data Berhasil Terhapus',
                  icon: 'success',
                  timer: 2000
                });
                // TampilKelas();
                window.location="<?=base_url('Admin/Siswa')?>";
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