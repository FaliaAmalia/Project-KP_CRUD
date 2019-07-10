<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data employee</h3>

  <form id="form-update-employee" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dataEmployee->id; ?>">

    
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input value="<?php echo $dataEmployee->department_id; ?>" type="text" class="form-control" placeholder="department_id" name="department_id" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <input value="<?php echo $dataEmployee->nik; ?>" type="text" class="form-control" placeholder="nik" name="nik" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" value="<?php echo $dataEmployee->name; ?>" placeholder="name" name="name" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input value="<?php echo $dataEmployee->phone; ?>" type="text" class="form-control" placeholder="phone" name="phone" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input value="<?php echo $dataEmployee->email; ?>" type="text" class="form-control" placeholder="email" name="email" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataEmployee->posisition; ?>" type="text" class="form-control" placeholder="posisition" name="posisition" aria-describedby="sizing-addon2">
    </div>
<!--      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input value="<?php echo $dataEmployee->status; ?>" type="text" class="form-control" placeholder="status" name="status" aria-describedby="sizing-addon2">
    </div>-->
    
     <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tags"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="status" value="1" id="Active" class="minimal">
      <label for="active">Active</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="2" id="Not Active" class="minimal"> 
      <label for="notactive">Not Active</label>
        </span>
    </div>
    
    
    <div> 
         <span class="input-group-addon" id="sizing-addon2">
      
        <a href=""><img src="<?php echo base_url('../uploads/' . $dataEmployee->image) ?>" width="64" /></a></span>
    
    </div>

    
      <div class="input-group form-group">
      
          <input type="hidden" value="<?php echo $dataEmployee->image; ?>"  class="form-control" placeholder="image" name="image" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input value="<?php echo $dataEmployee->created; ?>" type="text" class="form-control" placeholder="created" name="created" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" value="<?php echo $dataEmployee->updated; ?>" class="form-control" placeholder="updated" name="updated" aria-describedby="sizing-addon2">
    </div>
       <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" value="<?php echo $dataEmployee->created_at; ?>"placeholder="created_at" name="created_at" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" value="<?php echo $dataEmployee->updated_at; ?>" placeholder="updated_at" name="updated_at" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      
          <input type="hidden" value="<?php echo $dataEmployee->password; ?>"  class="form-control" placeholder="password" name="password" aria-describedby="sizing-addon2">
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>