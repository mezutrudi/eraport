      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/simpangm'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="guru">Guru</label>
      <?php echo form_dropdown('guru', $guru, '', array('class'=>'form-control', 'id'=>'guru')); ?>
      <small class="text-danger">
        <?php echo form_error('id_guru'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="mapel">Mapel</label>
      <?php echo form_dropdown('mapel', $mapel, '', array('class'=>'form-control', 'id'=>'mapel')); ?>
      <small class="text-danger">
        <?php echo form_error('id_mapel'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <?php echo form_dropdown('kelas', $kelas, '', array('class'=>'form-control', 'id'=>'kelas')); ?>
      <small class="text-danger">
        <?php echo form_error('id_kelas'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
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