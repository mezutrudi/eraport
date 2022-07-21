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
<!-- <a href="<?=base_url('admin/tambahsiswa')?>" class="btn btn-block btn-primary" id="tomboltambah" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a><br> -->
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th></th>
    <th width="5%">No.</th>
    <th>NIS</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php
      $no=1;
      foreach($siswa->result_object() as $r) { ?>
    <tr>
      <td width="5%">
        <p><input type="checkbox" name="kelassiswa_id[]" id="kelassiswa_<?=$r->id_kelassiswa?>" value="<?=$r->id_kelassiswa?>"></p>
      </td>
      <td><?=$no?></td>
      <td><?=$r->nama_siswa?></td>
      <td width="10%">
        <ul class="d-flex">
          <li style="list-style: none;"><a href="<?=base_url('Admin/hapussiskel/'.$r->id_kelassiswa)?>" id="hapusdata" title="Hapus" class="text-danger" onclick="return confirm('Apakah')"><i class="fas fa-trash"></i></a></li>
        </ul>
      </td>
    </tr>
  <?php
  $no++; } ?>
  </tbody>
  <tfoot>
  <tr>
    <th></th>
    <th width="5%">No.</th>
    <th>NIS</th>
    <th>Aksi</th>
  </tr>
  </tfoot>
</table>
  <button type="button" class="btn btn-block btn-danger" style="width: 150px" id="hapusbanyak">Delete</button>
  <script type="text/javascript">
    $('#hapusbanyak').click(function(){
      var kelassiswa_id = [];
      $('input[name="kelassiswa_id[]"]:checked').each(function(){
        var id = $(this).val();
        kelassiswa_id.push(id_kelassiswa);
      });
      if(kelas_id == ""){
        alert('Tidak ada Kelas yang dipilih');
      } else{
        $.ajax({
          type:'ajax',
          method:'POST',
          url:'<?=base_url("Admin/hapusbanyaksiskel")?>',
          data:{id_kelassiswa:kelassiswa_id},
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
