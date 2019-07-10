<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Employee Data</h3>

  <form id="form-tambah-employee" method="POST" enctype="multipart/form-data">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="department_id" name="department_id" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <input type="text" class="form-control" placeholder="nik" name="nik" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="name" name="name" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input type="text" class="form-control" placeholder="phone" name="phone" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="email" name="email" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="posisition" name="posisition" aria-describedby="sizing-addon2">
    </div>
<!--      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="status" name="status" aria-describedby="sizing-addon2">
    </div>-->
      
      <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tags"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="status" value="1" id="Active" class="minimal">
      <label for="laki">Active</label>
        </span>  
        <span class="input-group-addon">
          <input type="radio" name="status" value="2" id="Not Active" class="minimal"> 
      <label for="perempuan">Not Active</label>
        </span>
    </div>
      
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-picture"></i>
      </span>
      <input type="file" class="form-control" placeholder="image" name="image" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" placeholder="created" name="created" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" placeholder="updated" name="updated" aria-describedby="sizing-addon2">
    </div>
       <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" placeholder="created_at" name="created_at" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" placeholder="updated_at" name="updated_at" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-lock"></i>
      </span>
      <input type="password" class="form-control" placeholder="password" name="password" aria-describedby="sizing-addon2">
    </div>
      
      
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>
  </form>
</div>
