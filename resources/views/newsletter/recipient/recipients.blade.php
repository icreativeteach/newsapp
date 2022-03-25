<div class="container mt-2">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2>Laravel 8 Ajax CRUD DataTables Tutorial</h2>
         </div>
         <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="recipientAdd()" href="javascript:void(0)"> Create recipient</a>
         </div>
      </div>
   </div>
   @if ($message = Session::get('success'))
   <div class="alert alert-success">
      <p>{{ $message }}</p>
   </div>
   @endif
   <div class="card-body">
      <table class="table table-bordered" id="recipient-datatable">
         <thead>
            <tr>
               <th>Id</th>
               <th>Email</th>
               <th>Group name</th>
               <th>Customer</th>
               <th>lastmailing</th>
               <th>lastread</th>
               <th>added</th>
               <th>double_optin_confirmed</th>
               <th>Action</th>
            </tr>
         </thead>
      </table>
   </div>
</div>
<?php //dd($recipientsgroupdata); 
//dd($newsletterRecipientsGroupReccords);?>
<!-- boostrap company model -->
<div class="modal fade" id="recipient-modal" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="recipientModal"></h4>
         </div>
         <div class="modal-body">
            <form action="javascript:void(0)" id="recipientForm" name="recipientForm" class="form-horizontal" method="POST">
               <input type="hidden" name="recipientId" id="recipientId">
               
               <div class="form-group">
                  <label for="recipientEmail" class="col-sm-2 control-label">Recipient email</label>
                  <div class="col-sm-12">
                     <input type="text" name="recipientEmail" id="recipientEmail" placeholder="Enter recipient email" class="form-control recipientEmail">
                  </div>
               </div>
               <div class="form-group">
                  <label for="selectedRecipientGroup" class="col-sm-2 control-label">Recipient email</label>
                  <div class="col-sm-12">
                     <select name="selectedRecipientGroup" class="selectedRecipientGroup" id="selectedRecipientGroup">
                        <option value="">Select group</option>
                        @foreach($newsletterRecipientsGroupReccords as $data)
                           <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                        
                     </select>
                  </div>
               </div>
               
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" id="recipientSave">Save changes
                  </button>
               </div>
            </form>
         </div>
         <div class="modal-footer"></div>
      </div>
   </div>
</div>
