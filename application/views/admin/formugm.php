      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/ubahgm'); ?>
<?php echo form_hidden('id_gm', $ubah->id_gm); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="guru">Nama Guru</label>
      <?php echo form_dropdown('guru', $guru, $selectedguru, array('class'=>'form-control')); ?>
      <small class="text-danger">
        <?php echo form_error('id_guru'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="mapel">Mata Pelajaran</label>
      <?php echo form_dropdown('mapel', $mapel, $selectedmapel, array('class'=>'form-control')); ?>
      <small class="text-danger">
        <?php echo form_error('id_guru'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <?php echo form_dropdown('kelas', $kelas, $selectedkelas, array('class'=>'form-control')); ?>
      <small class="text-danger">
        <?php echo form_error('kelas'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('edit', 'Ubah', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/gurumapel/')?>" class="btn btn-light">Batal</a>
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