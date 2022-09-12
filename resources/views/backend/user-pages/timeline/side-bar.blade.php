<div class="col-lg-3 pad-rght">
    <div class="card">
        <div class="tl-user-info pt-0">
            <div class="user-content">
            <div class="tl-user-details" style="display: grid;">
            <span class="text-right">
                <a class="edit-profile p-0 pt-2" style="cursor: pointer;" data-target="#edit_profile"  data-toggle="modal"><i class="fa fa-edit" style="font-size:17px;color:#f57b24;"></i></a></span>
                <!-- <div class="image-div">
                    <img class="rounded-circle w-100" src="{{ url('backend/images/user-image.png')}}"/>
                </div> -->
            <!-- <span class="text-right"><a class="edit-profile" style="cursor: pointer;" data-target="#edit_profile"  data-toggle="modal"><i class="fa fa-edit" style="font-size:18px;color:green;"></i></a></span> -->
                   
                </div>
                <div class="tl-user-details">
                    <div class="tl-user-img">
                    <input type="hidden" id="name" value="{{ $enquiry->vchr_customer_name }}">
                    <input type="hidden" id="email" value="{{ $enquiry->vchr_customer_email }}">
                    <input type="hidden" id="mobile" value="{{ $enquiry->mobile_no }}">
                    <input type="hidden" id="id" value="{{ $enquiry->pk_int_enquiry_id }}">
                        @if(!$enquiry->vchr_customer_name)
                            <img class="rounded-circle w-100" src="{{ url('backend/images/user-image.png')}}"/>
                        @else
                            <div class="user-img-t enquiry-profile-img" style="background: #6167e6;color: #fff;">
                                {{ strtoupper(  substr($enquiry->vchr_customer_name, 0, 1))}}
                            </div>
                        @endif
                    </div>
                    @if($enquiry->vchr_customer_name!=NULL)
                        <h6 class="mb-1">{{$enquiry->vchr_customer_name}}</h6>
                    @else
                        <h6 class="mb-1 ">Name</h6>
                    @endif
                    <!-- <span class="text-right"><a class="edit-profile" style="cursor: pointer;" data-target="#edit_profile" data-toggle="modal"><i class="fa fa-edit" style="font-size:18px;color:green;"></i></a></span> -->
                    <span class="mb-1 d-block text-center">{{$enquiry->vchr_customer_company_name}}</span>

                     <div class="text-center"><a href="tel:+{{$enquiry->country_code}}{{$enquiry->mobile_no}}" class="tel-a"> <img src="/backend/images/call.svg" width="30px" class="pr-2" > +{{$enquiry->country_code}}&nbsp;-&nbsp;{{$enquiry->mobile_no}} </a></div>
                     <ul class="timeline-opt">
                        <li class="navi-item">
                            <a href="#" enquiry-id="{{$enquiry->pk_int_enquiry_id}}" class="navi-link py-2 ks-izi-modal-trigger1" data-target="#ks-izi-modal-large1" data-toggle="modal">
                            <span class="navi-icon mr-2">
                                <img src="/backend/images/edit.png">
                            </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" id="delete_plan" enquiry-id="{{$enquiry->pk_int_enquiry_id}}" class="navi-link py-2 enquiry-delete">
                            <span class="navi-icon mr-2">
                                <img src="/backend/images/delete.png">
                            </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="{{url('user/template-whatsapp/'.$enquiry->pk_int_enquiry_id)}}" target="_blank" class="navi-link py-2">
                            <span class="navi-icon mr-2">
                                <img src="/backend/images/whatsapp.svg" width="28px">
                            </span>
                            </a>
                        </li>
                       <li class="navi-item">
                            <a target="_blank" href="{{url('user/enquiry-sms/'.$enquiry->pk_int_enquiry_id)}}" class="navi-link py-2">
                            <span class="navi-icon mr-2">
                                <img src="/backend/images/chat.svg" width="28px">
                            </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a target="_blank" href="{{url('user/sales/orders/create/'.$enquiry->pk_int_enquiry_id)}}" class="navi-link py-2">
                            <span class="navi-icon mr-2">
                                <img src="/backend/images/cart.svg" width="28px">
                            </span>
                            </a>
                        </li>
                    </ul>
                   </div>
                <div class="tl-user-adrs mt-0">
                    <ul>
                        {{--  <li><i class="fa fa-home"></i>{{$enquiry->vchr_customer_name}}</li> --}}
                        <!-- <li> <img src="/backend/images/call.svg" width="30px" class="pr-2" > +{{$enquiry->country_code}}&nbsp;-&nbsp;{{$enquiry->mobile_no}}</li> -->
                        @if($enquiry->vchr_customer_email)
                            <li class="scrl short-mail" data-toggle="tooltip" data-theme="dark" title="{{$enquiry->vchr_customer_email}}"> <img src="/backend/images/mail.svg" width="30px" class="pr-2" ><a href="mailto:{{$enquiry->vchr_customer_email}}" style="color:#000 !important;padding:0px !important;text-transform: lowercase;display:inline;" >{{$enquiry->vchr_customer_email}}</a></li>
                        @endif

                    </ul>
                    <ul>
                            <li class="scrl bg-default text-dark" data-toggle="tooltip" data-theme="dark" title="{{$message}}"> <i class="fa fa-fire"></i>{{$message}}</li>
                    </ul>
                </div>
            </div>
            <div class="tl-details">
                <ul>
                <li>
                        <label>Created by:</label>
                        <p>{{$enquiry->created_by_user ?? 'System'}}</p>
                    </li>
                    <li>
                        <label>Source:</label>
                        <p>{{$enquiry->enquiry_type}}</p>
                    </li>
                    <li>
                        <label>Purpose:</label>
                       {{--  <p>{{$enquiry->vchr_purpose}}</p> --}}
                        <select class="select2" id="timeline-enq-purpose" data-minimum-results-for-search="Infinity"
                                style="width: 60%; height: 100%">
                                <option>Select Purpose:</option>
                           @foreach($enquiry_purpose as $enq_purpose)
                                <option value="{{$enq_purpose->pk_int_purpose_id}}"
                                        @if($enq_purpose->pk_int_purpose_id == $enquiry->fk_int_purpose_id) selected @endif>
                                    {{$enq_purpose->vchr_purpose}}</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        <label>Status:</label>
                        <select class="select2" id="timeline-status" data-minimum-results-for-search="Infinity"
                                style="width: 60%; height: 100%">
                            <option value="">No Status</option>
                            @foreach($enquiry_status as $enq_status)
                                <option value="{{$enq_status->pk_int_feedback_status_id}}"
                                        @if($enq_status->pk_int_feedback_status_id== $enquiry->feedback_status) selected @endif>
                                    {{$enq_status->vchr_status}}@if($enq_status->fk_int_user_id==0)(Default)@endif</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        <label>Assigned To:</label>
                        <label>{{$enquiry->vchr_user_name ?? 'UnAssigned'}}</label>
                        <!-- <input class="form-control" id="timeline-status" readonly 
                                style="width: 60%;height: 100%;background: white;border: none;border-bottom: 1px solid #e4e4e4;border-radius: 0;" value="{{$enquiry->vchr_user_name ?? 'UnAssigned'}}"> -->
                    </li>
                    @if($enquiry->district_id)
                    <li>
                        <label>District:</label>
                        <select class="select2" id="timeline-status" data-minimum-results-for-search="Infinity"
                                style="width: 60%; height: 100%" disabled>
                                @foreach($districts as $district)
                                    <option @if($enquiry->district_id == $district->id) selected @endif>{{ $district->name }}</option>
                                @endforeach
                        </select>
                    </li>
                    @endif
                    @if($enquiry->taluk_id)
                    <li>
                        <label>Taluk:</label>
                        <select class="select2" id="timeline-status" data-minimum-results-for-search="Infinity"
                                style="width: 60%; height: 100%" disabled>
                                @foreach($taluks as $taluk)
                                <option @if($enquiry->taluk_id == $taluk->id) selected @endif>{{ $taluk->name }}</option>
                                @endforeach
                        </select>
                    </li>
                    @endif
                    @foreach($additional_fields as $additional_field)
                        <li>
                            <label>{{$additional_field->field_name}}</label>
                            <label class="input-boxes">
                            @if( $additional_field->input_type==1)
                                <input @if(isset($additional_details[$additional_field->id])) value="{{$additional_details[$additional_field->id]}}" @endif type="text" class="form-control additional_fields" data-field_id="{{$additional_field->id}}" name="additional_field[{{$additional_field->id}}]" id="additional_field_{{$additional_field->id}}" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>
                                
                            @elseif( $additional_field->input_type==2)
                                
                                <select class="form-control additional_fields select2" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]"
                                        id="enquiryTypeSelect" @if($additional_field->is_required == 1) required="" @endif>
                                    <option value="">--Select {{$additional_field->field_name}}--</option>
                                    @foreach($additional_field->values as $key=>$value)
                                        <option  @if(isset($additional_details[$additional_field->id]) && $additional_details[$additional_field->id]==$value) selected @endif  value="{{$value }}"
                                                >{{$value }}</option>
                                    @endforeach
                                </select>
                            @elseif( $additional_field->input_type==8) <!-- Multi Select -->
                            
                            <select class="form-control additional_fields select2" multiple data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}][]"
                                    id="enquiryTypeSelect" @if($additional_field->is_required == 1) required="" @endif>
                                <option value="">--Select {{$additional_field->field_name}}--</option>
                                @foreach($additional_field->decoded_values as $key=>$value)
                                    <option  @if(isset($additional_details[$additional_field->id]) && $additional_details[$additional_field->id]!='' && in_array($value, json_decode($additional_details[$additional_field->id]))) selected @endif  value="{{$value }}"
                                            >{{$value }}</option>
                                @endforeach
                            </select>
                            @elseif($additional_field->type_text=='Date')
                                <input @if(isset($additional_details[$additional_field->id])) value="{{$additional_details[$additional_field->id]}}" @endif  type="date" class="form-control additional_fields" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>    
                            @elseif($additional_field->type_text=='Time')
                                <input @if(isset($additional_details[$additional_field->id])) value="{{$additional_details[$additional_field->id]}}" @endif  type="time" class="form-control additional_fields" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>
                            @elseif($additional_field->type_text=='DateTime')
                                <input @if(isset($additional_details[$additional_field->id])) value="{{$additional_details[$additional_field->id]}}" @endif  type="datetime-local" class="form-control additional_fields" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>  
                            @elseif($additional_field->type_text=='Image')
                                <input type="file" class="form-control additional_fields" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>
                            @else
                                <input @if(isset($additional_details[$additional_field->id])) value="{{$additional_details[$additional_field->id]}}" @endif  type="text" class="form-control additional_fields" data-field_id="{{$additional_field->id}}"  name="additional_field[{{$additional_field->id}}]" placeholder="{{$additional_field->field_name}}"
                                    autocomplete="off" @if($additional_field->is_required == 1) required="" @endif>
                            @endif
                            </label>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
