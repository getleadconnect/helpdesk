<div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
        <form  id="profile_edit">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold g-clr">Edit Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
          
                        <div class="md-form mb-1">
                            <label for="default-input" class="form-control-label">Name</label>
                           <input type="text" name="lead_name" id="lead_name" class="form-control" placeholder="Enter Name" value="">        
                        </div>
                        <div class="md-form mb-1">
                            <label for="default-input" class="form-control-label">Mobile</label>
                            <input type="text" name="lead_mobile" id="lead_mobile" class="form-control" placeholder="Enter Mobile" rows="4"></textarea>

                        </div>   
                        <div class="md-form mb-1">
                            <label for="default-input" class="form-control-label">E-mail</label>
                            <input name="lead_email" class="form-control" id="lead_email" placeholder="Enter E-mail"/>

                        </div>
                      
                    </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="lead_id" id="lead_id">
                            <button id="add-template" class="btn btn-deep-orange demo-btn">Update&nbsp;<i class="fa fa-refresh fa-spin" id="edit_spin"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
