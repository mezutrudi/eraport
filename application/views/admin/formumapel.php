      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/ubahmapel'); ?>
<?php echo form_hidden('id_mapel', $ubah->id_mapel); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="mapel">Mata Pelajaran</label>
      <?php echo form_input('mapel', $ubah->mapel, array('class'=>'form-control', 'id'=>'mapel', 'placeholder'=>'Mata Pelajaran')); ?>
      <small class="text-danger">
        <?php echo form_error('mapel'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="aktif">Kelompok</label>
      <?php 
        $kelompok = array(
          '' => '--Pilih Kelompok--',
          'A' => 'Kelompok A',
          'B' => 'Kelompok B',
        );
        $ubah->kelompok
       ?>
       <?php echo form_dropdown('kelompok', $kelompok, $ubah->kelompok, array('class'=>'form-control', 'id'=>'kelompok',)); ?>
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