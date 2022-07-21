      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/simpanta'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="semester">Semester</label>
      <?php 
        $semester = array(
          '' => '--Pilih Semester--',
          'ganjil' => 'Ganjil',
          'genap' => 'Genap',
        );
       ?>
       <?php echo form_dropdown('semester', $semester, '', array('class'=>'form-control', 'id'=>'semester',)); ?>
      <small class="text-danger">
        <?php echo form_error('semester'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="tahun">Tahun Ajaran</label>
      <?php echo form_input('tahun', set_value('id_ta'), array('class'=>'form-control', 'id'=>'tahun', 'placeholder'=>'Tahun Ajaran')); ?>
      <small class="text-danger">
        <?php echo form_error('id_ta'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <?php echo form_input('nama', set_value('nama'), array('class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama Semester')); ?>
      <small class="text-danger">
        <?php echo form_error('nama'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="aktif">Aktif ?</label>
      <?php 
        $aktif = array(
          '0' => '--Pilih Status--',
          'Ya' => 'Ya',
          'Tidak' => 'Tidak',
        );
       ?>
       <?php echo form_dropdown('aktif', $aktif, '0', array('class'=>'form-control', 'id'=>'aktif',)); ?>
      <small class="text-danger">
        <?php echo form_error('aktif'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/tahunajaran/')?>" class="btn btn-light">Batal</a>
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