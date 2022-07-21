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
<a href="<?=base_url('admin/tambahta')?>" class="btn btn-block btn-primary" id="tomboltambah" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a><br>
<table id="example1" class="table table-bordered table-striped display nowrap">
  <thead>
  <tr>
    <th width="5%">No.</th>
    <th>Semester</th>
    <th>Tahun</th>
    <th>Aktif ?</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  	<?php if ($ta->num_rows() > 0) {
  		$no=1;
  		foreach ($ta->result_object() as $r) {

  	?>
	  <tr>
	    <td><?=$no?></td>
	    <td><?=$r->semester?></td>
	    <td><?=$r->tahun?></td>
	    <td>
        <?php 
            if ($r->aktif=='Ya') {
              $aktif="Semester Aktif";
            }else{
              $aktif="Semester Tidak Aktif";
            }
            echo $aktif;
         ?>          
      </td>
      <td width="10%">
        <ul class="d-flex">
          <li style="list-style: none;" class="mr-3"><a href="<?=base_url('Admin/formubahta/'.$r->id_ta)?>" id="editdata" class="text-secondary" title="Ubah"><i class="fas fa-edit"></i></a></li>
          <li style="list-style: none;"><a href="<?=base_url('Admin/hapusta/'.$r->id_ta)?>" id="hapusdata" title="Hapus" class="text-danger" onclick="return confirm('Apakah')"><i class="fas fa-trash"></i></a></li>
        </ul>
      </td>
	  </tr>
	<?php
	$no++;
  		}
  	} else {
  	?>
  	<tr>
      <td colspan="5"><center>Data Kosong</center></td>
  	</tr>
  	<?php
  	}
  	 ?>
  </tbody>
  <tfoot>
  <tr>
    <th>No.</th>
    <th>Semester</th>
    <th>Tahun</th>
    <th>Aktif ?</th>
    <th>Aksi</th>
  </tr>
  </tfoot>
</table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?=$awal ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>