<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List Guest (Dari Guest: <b><?php echo $summary->title; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Fullname</th>
            <th>Title</th>
            <th>Company</th>
            <th>Email</th>
            <th>Phone</th>
          </tr>
        </thead>

        <tbody id="data-summary">
          <?php
            foreach ($dataSummary as $guest) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $guest->fullname; ?></td>
                <td><?php echo $guest->title; ?></td>
                <td><?php echo $guest->company; ?></td>
                <td><?php echo $guest->email; ?></td>
                                <td><?php echo $guest->phone; ?></td>

              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>