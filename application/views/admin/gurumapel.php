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
<a href="<?=base_url('admin/tambahgm')?>" class="btn btn-block btn-primary" id="tomboltambah" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a><br>
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th></th>
    <th width="5%">No.</th>
    <th>Nama Guru</th>
    <th>Mata Pelajaran</th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  	<?php if ($mapel1->num_rows() > 0) {
  		$no=1;
  		foreach ($mapel as $r) {

  	?>
	  <tr>
      <td width="5%">
        <p><input type="checkbox" name="gm_id[]" id="gm_<?=$r->id_gm?>" value="<?=$r->id_gm?>"></p>
      </td>
	    <td><?=$no?></td>
	    <td><?=$r->nama?></td>
	    <td><?=$r->mapel?></td>
	    <td><?=$r->namakls?></td>
	    <td width="10%">
	    	<ul class="d-flex">
	    		<li style="list-style: none;" class="mr-3"><a href="<?=base_url('Admin/formubahgm/'.$r->id_gm)?>" id="editdata" class="text-secondary" title="Ubah"><i class="fas fa-edit"></i></a></li>
	    		<li style="list-style: none;"><a href="<?=base_url('Admin/hapusgm/'.$r->id_gm)?>" id="hapusdata" title="Hapus" class="text-danger" onclick="return confirm('Apakah')"><i class="fas fa-trash"></i></a></li>
	    	</ul>
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
    <th>Nama Guru</th>
    <th>Mata Pelajaran</th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  </tfoot>
</table>
  <button type="button" class="btn btn-block btn-danger" style="width: 150px" id="hapusbanyak">Delete</button>

  <script type="text/javascript">
    $('#hapusbanyak').click(function(){
      var mapel_id = [];
      $('input[name="mapel_id[]"]:checked').each(function(){
        var id = $(this).val();
        mapel_id.push(id_mapel);
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