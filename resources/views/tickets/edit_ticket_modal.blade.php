<div class="modal fade ticket-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
aria-hidden="true" id="edit_ticket_modal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header p-0 mb-3">
            <h5 class="modal-title m-0 text-capitalize">Create new Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="create_ticket_form">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Enquiry</label>
                        {!! Form::select('enquiries', $enquiries, null, ['class' => 'form-control','id'=>'enquiry_id']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Openend By</label>
                        {!! Form::select('assigned_to', $agents, null, ['class' => 'form-control','id'=>'assigned_to']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Assigned To</label>
                        {!! Form::select('assigned_to', $agents, null, ['class' => 'form-control','id'=>'assigned_to']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Group</label>
                        {!! Form::select('group_id', $groups, null, ['class' => 'form-control','id'=>'group_id']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Agent</label>
                        {!! Form::select('agent_id', $agents, null, ['class' => 'form-control','id'=>'agent_id']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        {!! Form::select('status_id', $statuses, null, ['class' => 'form-control','id'=>'status_id']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Priority</label>
                        {!! Form::select('priority_id', $priorities, null, ['class' => 'form-control','id'=>'priority_id']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Subject</label>
                        <textarea class="form-control" name="subject" id="subject" rows="3" Placeholder="Subject">GetLead Ticket</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">Please look into the concern raised by me</textarea>
                    </div>
                </div>
            </div>
            <div class="btn-div">
                <a href="#" class="with-border">Cancel</a> 
                <a href="#" class="with-bg" id="create_ticket">Create ticket</a>
            </div>
        </form>
    </div>
</div>