<div class="container mt-2">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2>Laravel 8 Ajax CRUD DataTables Tutorial</h2>
         </div>
         <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="recipientgroupAdd()" href="javascript:void(0)"> Create recipientgroup</a>
         </div>
      </div>
   </div>
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="card-body">
      <table class="table table-bordered" id="recipientgroup-datatable">
         <thead>
            <tr>
               <th>Id</th>
               <th>Name</th>
                <th>Count</th> 
               <th>Action</th>
            </tr>
         </thead>
      </table>
   </div>
</div>
<!-- boostrap company model -->
<div class="modal fade" id="recipientgroup-modal" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="recipientgroupModal"></h4>
         </div>
         <div class="modal-body">
            <form action="javascript:void(0)" id="recipientgroupForm" name="recipientgroupForm" class="form-horizontal" method="POST">
               <input type="hidden" name="recipientgroupId" id="recipientgroupId">
               
               <div class="form-group">
                  <label for="recipientgroupName" class="col-sm-2 control-label">Recipientgroup name</label>
                  <div class="col-sm-12">
                     <input type="text" name="recipientgroupName" id="recipientgroupName" placeholder="Enter recipientgroup name" class="form-control recipientgroupName">
                  </div>
               </div>
               
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" id="recipientgroupSave">Save changes
                  </button>
               </div>
            </form>
         </div>
         <div class="modal-footer"></div>
      </div>
   </div>
</div>
