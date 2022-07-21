      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/ubahsiswa'); ?>
<?php echo form_hidden('id_siswa', $ubah->id_siswa); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="nis">NIS</label>
      <?php echo form_input('nis', $ubah->nis, array('class'=>'form-control', 'id'=>'nis', 'placeholder'=>'NIS')); ?>
      <small class="text-danger">
        <?php echo form_error('semester'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nisn">NISN</label>
      <?php echo form_input('nisn', $ubah->nisn, array('class'=>'form-control', 'id'=>'nisn', 'placeholder'=>'NISN')); ?>
      <small class="text-danger">
        <?php echo form_error('nisn'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nama_siswa">Nama</label>
      <?php echo form_input('nama_siswa', $ubah->nama_siswa, array('class'=>'form-control', 'id'=>'nama_siswa', 'placeholder'=>'Nama Siswa')); ?>
      <small class="text-danger">
        <?php echo form_error('nama_siswa'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/siswa/')?>" class="btn btn-light">Batal</a>
  </div>
<?php echo form_close(); ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <?=$awal ?>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>        </div></div>