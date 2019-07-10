<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <style>
            #t{
                overflow-x:scroll;
                overflow-y:auto;

            }
        </style>
        <div id="t">

            <table id="list-data" class="table table-bordered table-striped">


                <thead>
                    <tr>
                        <th>No</th>
              <!--          <th>Foto</th>-->
                        <th>Fullname</th>
                        <th>Company</th>
                        <th>Image</th>
                        <th>Interest</th>
                        <th>Datetime</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody id="data-todolist">

                </tbody>
            </table>
        </div>

    </div>
    
   

<div id="tempat-modal"></div>
</div>

