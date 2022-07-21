
  <script type="text/javascript" src="<?=base_url('public/')?>jquery/jquery-3.3.1.min.js"></script>
  <script src="<?=base_url('public/')?>plugins/jquery/jquery.min.js"></script>
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
<a href="<?=base_url('admin/tambahkelas')?>" class="btn btn-block btn-primary" id="tomboltambah" style="width: 150px"><i class="fas fa-plus-circle"></i> Tambah</a><br>
<table id="example1" class="table table-bordered table-striped display nowrap" border="1">
  <thead>
  <tr>
    <th width="5%">No.</th>
    <th>Nama Kelas</th>
    <th>Wali Kelas</th>
    <th>Tahun</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody id="tampilkelas">
  </tbody>
  <tfoot>
  <tr>
    <th>No.</th>
    <th>Nama Kelas</th>
    <th>Wali Kelas</th>
    <th>Tahun</th>
    <th>Aksi</th>
  </tr>
  </tfoot>
</table>
  <button type="button" class="btn btn-block btn-danger" style="width: 150px" id="hapusbanyak">Delete</button>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tampilkelas').load("<?=base_url('beranda-kelas') ?>");
  });
</script>