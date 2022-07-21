      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-body">
<?php echo form_open('Admin/simpanguru'); ?>
  <div class="card-body">
    <div class="form-group">
      <label for="nip">NIP</label>
      <?php echo form_input('nip', set_value('nip'), array('class'=>'form-control', 'id'=>'nip', 'placeholder'=>'NIP')); ?>
      <small class="text-danger">
        <?php echo form_error('nip'); ?>
      </small>
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <?php echo form_input('nama', set_value('nama'), array('class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama ')); ?>
      <small class="text-danger">
        <?php echo form_error('nama'); ?>
      </small>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">    
  <?php echo form_submit('save', 'Simpan', array('class'=>'btn btn-primary mr-2')); ?>
  <a href="<?=base_url('admin/guru/')?>" class="btn btn-light">Batal</a>
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