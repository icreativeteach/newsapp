<div class="container mt-2">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2>Laravel 8 Ajax CRUD DataTables Tutorial</h2>
         </div>
         <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="senderAdd()" href="javascript:void(0)"> Create Sender</a>
         </div>
      </div>
   </div>
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="card-body">
      <table class="table table-bordered" id="sender-datatable">
         <thead>
            <tr>
               <th>Id</th>
               <th>Email</th>
               <th>Name</th>
               <th>Action</th>
            </tr>
         </thead>
      </table>
   </div>
</div>
<!-- boostrap company model -->
<div class="modal fade" id="sender-modal" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="senderModal"></h4>
         </div>
         <div class="modal-body">
            <form action="javascript:void(0)" id="senderForm" name="senderForm" class="form-horizontal" method="POST">
               <input type="hidden" name="senderId" id="senderId">
               <div class="form-group">
                  <label for="senderEmail" class="col-sm-2 control-label">Sender email</label>
                  <div class="col-sm-12">
                     <input type="text" name="senderEmail" id="senderEmail" placeholder="Enter Email Address" class="form-control senderEmail">
                  </div>
               </div>
               <div class="form-group">
                  <label for="senderName" class="col-sm-2 control-label">Sender name</label>
                  <div class="col-sm-12">
                     <input type="text" name="senderName" id="senderName" placeholder="Enter Sender Name" class="form-control senderName">
                  </div>
               </div>
               
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" id="senderSave">Save changes
                  </button>
               </div>
            </form>
         </div>
         <div class="modal-footer"></div>
      </div>
   </div>
</div>



<!-- start delete model -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Are you sure want to delete this item?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary hardDelete">Save changes</button>
      </div>
    </div>
  </div>
</div>
 
<!-- end delete model -->