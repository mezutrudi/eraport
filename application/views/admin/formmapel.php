      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/simpanmapel'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="mapel">Mata Pelajaran</label>
      <?php echo form_input('mapel', set_value('mapel'), array('class'=>'form-control', 'id'=>'mapel', 'placeholder'=>'Mata Pelajaran')); ?>
      <small class="text-danger">
        <?php echo form_error('mapel'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="aktif">Aktif ?</label>
      <?php 
        $kelompok = array(
          '' => '--Pilih Kelompok--',
          'A' => 'Kelompok A',
          'B' => 'Kelompok B',
        );
       ?>
       <?php echo form_dropdown('kelompok', $kelompok, '', array('class'=>'form-control', 'id'=>'kelompok')); ?>
      <small class="text-danger">
        <?php echo form_error('kelompok'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/mapel/')?>" class="btn btn-light">Batal</a>
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