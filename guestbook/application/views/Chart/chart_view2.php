<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-event"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>   
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
      
      </tbody>
    </table>
  </div>
</div>

