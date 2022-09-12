<div class="modal fade ticket-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
id="time_line_modal">
    <div class="modal-dialog modal-lg modal-dialog-full">
        <div class="modal-content">
            <div class="modal-header p-0 mb-3">
                <h5 class="modal-title m-0 text-capitalize">Ticket Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="main-wrapper main-wrapper-change">
            <div class="content-section bg-white pt-0 pl-3 pr-3 pb-0">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="summernote" id="summernote">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                             Quisque scelerisque diam non nisi semper, et elementum lorem ornare.
                        </div>  
                        <button id="save_note" class="btn btn-primary btn-sm"  type="button">Save</button>
                        <button id="clear" class="btn btn-primary btn-sm"  type="button">Clear</button>
                        <div class="row">
                            <div class="col-md-12 notes-container">
                                <ul class="timeline deal_timeline">
                                    @foreach($notes as $note)
                                        <li>
                                            <a target="_blank" href="">{{ $note->first_name }} changed the status</a>
                                            <a href="#" class="float-right">{{ date('jS M, Y', strtotime($note->created_at)) }}</a>
                                            <p>{{ $note->note }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        </div>
    </div>
</div>
