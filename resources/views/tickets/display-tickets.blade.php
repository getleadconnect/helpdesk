@extends('layouts.master')
@section('page-header')
@endsection
@section('content')
{{-- <main class="main-wrapper"> --}}
   <div class="layout-wrapper">
      <!--   / Side menu included /  -->
      {{-- @include ('layouts.sidebar') --}}
      <div class="content-section p-0">
         <!--  /Your content goes here/ -->
         <section class="dashboard-sec p-0">
            <div class="content d-flex flex-column flex-column-fluid">
               <div class="d-flex flex-column-fluid">
                  <div class="bg-white w-100 tickets">
                     <!--begin::Container-->
                     <div class="container-fluid">
                        <div class="row mt-5">
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="total-cnt">85</h2>
                                 <h5 class="lead-gen-ttile">Total tickets</h5>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="running-cnt">40</h2>
                                 <h5 class="lead-gen-ttile">Open</h5>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="resolved-cnt">15</h2>
                                 <h5 class="lead-gen-ttile">Resolved</h5>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="not-cnt">30</h2>
                                 <h5 class="lead-gen-ttile">Closed</h5>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="completed-cnt">85</h2>
                                 <h5 class="lead-gen-ttile">Overdue</h5>
                              </div>
                           </div>
                           <div class="col-lg-2">
                              <div class="lead-count-div">
                                 <h2 class="un-cnt">40</h2>
                                 <h5 class="lead-gen-ttile">Unassigned</h5>
                              </div>
                           </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row mt-5">
                           <div class="col-lg-12">
                              <div class="row">
                                 <div class="col-lg-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                       <div class="form-check all-check">
                                          <input class="form-check-input checkBoxClass" type="checkbox" value="" id="selectAll">
                                          <label class="form-check-label" for="flexCheckDefault">
                                          Select All
                                          </label>
                                       </div>
                                       <form class="search-f form-inline d-flex justify-content-center md-form form-sm mt-0">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                          <input class="form-control form-control-sm" type="text" placeholder="Search here" aria-label="Search">
                                       </form>
                                    </div>
                                 </div>
                                 <div class="col-lg-5">
                                    <div class="tbl-h-details">
                                       <!-- <div class="main-round-btn" onclick="clearfields()">
                                          <a data-toggle="modal" data-target="#update_status" id="ass_agentAllEnq"
                                             href="#">
                                             <i class="fa fa-star"></i>Update Status</a>
                                          </div> -->
                                       <!-- <div class="main-round-btn">
                                          <a data-toggle="modal" data-target="#ass_agent" id="ass_agentAllEnq"
                                             href="#">
                                             <i class="fa fa-user"></i>Assign Agent</a>
                                          </div> -->
                                       <!-- <div class="main-round-btn green-btn">
                                          <a id="addEnquiry" href="http://demo2.getlead.co.uk/user/enquiries/create"><i class="fa fa-plus"></i>Leads</a>
                                          </div> -->
                                       <!-- <div class="main-round-btn">
                                          <a data-toggle="modal" data-target="#enquiry-upload-modal" id="uploadEnquiry"
                                             href="#"><i
                                                      class="fa fa-upload"></i> Contacts </a>
                                          </div> -->
                                       <!-- <div class="main-round-btn">
                                          <a id="whatsAppCon" onclick="WhatsappModal()"
                                             href="#"><i
                                                      class="fa fa-whatsapp"></i> Connect</a>
                                          </div> -->
                                       <div class="filter-round-btn">
                                          <a data-toggle="collapse" href="#collapseExample" title="Filter" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i>Filter</a>
                                       </div>
                                       <div class="text-right chart-filter my-0">
                                          <div class="input-group with-addon-icon-left" style="display:none">
                                             <select class="form-control " style="    height: 36px;font-size: 12px;font-weight: 500;
                                                color: #1d1d1d;margin-right:30px" id="sort_by">
                                                <option value="1" selected="">Created Date</option>
                                                <option value="2">Updated Date</option>
                                             </select>
                                          </div>
                                          <div class="main-round-btn" id="btnActions" style="background: #aeafbd;">
                                             <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="fa fa-sort"></i>Sort by</a>
                                             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="navi navi-hover">
                                                   <li class="navi-item" onclick="sortBy(1)">
                                                      <a href="#" class="navi-link py-2">
                                                      <span class="navi-text" id="sort_By1">   Created Date <i class="fa fa-check pl-2 sort_check"></i></span>
                                                      </a>
                                                   </li>
                                                   <li class="navi-item" onclick="sortBy(2)">
                                                      <a href="#" class="navi-link py-2">
                                                      <span class="navi-text" id="sort_By2">Updated Date <i class="fa fa-check pl-2 sort_check" style="display:none"></i></span>
                                                      </a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- <form id="delete_multiple_lead">
                                          <input type="hidden" name="_token" value="quCVaQIWcmiujuXNb3jjfLB95H44NnHDsuuIbnKi">
                                          <input type="hidden" id="id_leads" name="lead_ids"> -->
                                       <!-- <button id="delete_leads" class="btn main-round-btn"
                                          style="min-width:auto;background-color:#ff6776;"><i class="fa fa-trash m-0"
                                                                                             id="edit_spin"></i></button> -->
                                       <!-- </form> -->
                                       <div class="main-round-btn" id="btnActions">
                                          <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fa fa-cogs"></i>Actions</a>
                                          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                             <ul class="navi navi-hover">
                                                <li class="navi-item" onclick="clearfields()">
                                                   <a href="#" data-toggle="modal" data-target="#update_status" id="ass_agentAllEnq" class="navi-link py-2">
                                                   <span class="navi-text"> <i class="fa fa-star"></i> Update status</span>
                                                   </a>
                                                </li>
                                                <li class="navi-item">
                                                   <a href="#" data-toggle="modal" data-target="#ass_agent" id="ass_agentAllEnq" class="navi-link py-2">
                                                   <span class="navi-text"><i class="fa fa-user"></i> Assign agent</span>
                                                   </a>
                                                </li>
                                                <li class="navi-item">
                                                   <a href="#" data-toggle="modal" data-target="#enquiry-upload-modal" id="uploadEnquiry" class="navi-link py-2">
                                                   <span class="navi-text"> <i><img src="/backend/images/file-import-solid.svg" width="11px"></i> Import contacts</span>
                                                   </a>
                                                </li>
                                                <li class="navi-item">
                                                   <a href="#" id="btnCreateCampaign" data-toggle="modal" data-target=".ticket-add" class="navi-link py-2">
                                                   <span class="navi-text"> <i><img src="/backend/images/add-to-campaign.svg" width="11px"></i> Add Tickets </span>
                                                   </a>
                                                </li>
                                                <li class="navi-item">
                                                   <a href="#" id="btnCreateCallTask" class="navi-link py-2">
                                                   <span class="navi-text"> <i><img src="/backend/images/call-task.svg" width="11px"></i> Create Call Task </span>
                                                   </a>
                                                </li>
                                                <li class="navi-item" onclick="deleteMultiple()">
                                                   <form id="delete_multiple_lead">
                                                      <input type="hidden" name="_token" value="quCVaQIWcmiujuXNb3jjfLB95H44NnHDsuuIbnKi">
                                                      <input type="hidden" id="id_leads" name="lead_ids">
                                                      <a href="#" id="delete_leads" class="navi-link py-2">
                                                      <span class="navi-text"><i class="fa fa-trash"></i> Delete</span>
                                                      </a>
                                                   </form>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="mb-0 form-group">
                                 <div class="collapse" id="collapseExample" style="">
                                    <div class="card card-body filter-container bg-light-grey">
                                       <form class="" id="getReport" enctype="multipart/form-data">
                                          <div class="row">
                                             <!-- <div class="col-sm-3">
                                                <input name="" class="date form_datetime form-control" type="text"
                                                       id="created_at_from"
                                                       value="" placeholder="Select From Date and Time" readonly>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input name="" class="date form_datetime form-control" type="text"
                                                        id="created_at_to"
                                                        value="" placeholder="Select To Date and Time" readonly>
                                                </div> -->
                                             <div class="col-sm-3">
                                                <div class="input-group with-addon-icon-left" id="range_date">
                                                   <input type="text" class="form-control date_picker" placeholder="Date" name="all_date" autocomplete="off" id="all_date">
                                                   <span class="input-group-append">
                                                   <span class="input-group-text">
                                                   <i class="fa fa-calendar"></i>
                                                   </span>
                                                   </span>
                                                   <div class="invalid-feedback"></div>
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%; height: 100%" id="enquiryTypeId" tabindex="-1" aria-hidden="true">
                                                   <option value="">Select Enquiry Source</option>
                                                   <option value="1">Call
                                                   </option>
                                                   <option value="13">Manual
                                                   </option>
                                                   <option value="14">Facebook Lead Ads
                                                   </option>
                                                   <option value="15">Excel Import
                                                   </option>
                                                   <option value="16">Website Enquiry
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%; height: 100%" id="enquiryPurposeId" tabindex="-1" aria-hidden="true">
                                                   <option value="">Select Enquiry Purpose</option>
                                                   <option value="2">test
                                                   </option>
                                                   <option value="3">test2
                                                   </option>
                                                   <option value="4">test 3
                                                   </option>
                                                   <option value="5">test
                                                   </option>
                                                   <option value="6">test8
                                                   </option>
                                                   <option value="19">CRM
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%; height: 100%" id="enquiryStatusId" tabindex="-1" aria-hidden="true">
                                                   <option value="">Select Lead Status</option>
                                                   <option value="1002">Active
                                                   </option>
                                                   <option value="1003">Quotation
                                                   </option>
                                                   <option value="1004">Work Completed
                                                   </option>
                                                   <option value="1005">Interested
                                                   </option>
                                                   <option value="1006">Busy
                                                   </option>
                                                   <option value="1007">Spam
                                                   </option>
                                                   <option value="1008">New
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%; height: 100%" id="districtId" tabindex="-1" aria-hidden="true">
                                                   <option value="">Select District</option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" id="created_by" style="width: 100%; height: 100%" tabindex="-1" aria-hidden="true">
                                                   <option value="">Created By</option>
                                                   <option value="2">Akhila
                                                   </option>
                                                   <option value="3">Anusree
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" id="staff_id" style="width: 100%; height: 100%" tabindex="-1" aria-hidden="true">
                                                   <option value="">Assigned To</option>
                                                   <option value="unassigned">UnAssigned</option>
                                                   <option value="3">Anusree
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="col-sm-3">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%; height: 100%" id="leadTypeId" tabindex="-1" aria-hidden="true">
                                                   <option value="">Select Lead Type</option>
                                                   <option value="1" >HOT
                                                   </option>
                                                </select>
                                             </div>
                                             <div class="filter-round-btn ml-3">
                                                <a href="#" role="button" onclick="filterData()" aria-expanded="false" id="filter">Filter</a>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div id="tabs" class="">
                                 <div id="tabs-1">
                                    <div class="lead-dt-div">
                                       <div class="row no-gutters">
                                          <div class="col-lg-7">
                                             <div class="d-flex">
                                                <div class="form-check mr-3">
                                                   <input class="form-check-input checkBoxClass" type="checkbox" value="" id="flexCheckChecked">
                                                </div>
                                                <div class="ticket-dt">
                                                   <h5 class="mt-0 mb-1"><span>#5634 -</span> Product launch  </h5>
                                                   <p class="mb-2">Your description here to know the details of campaign</p>
                                                   <div class="date-div">
                                                      <span>Created on: <span class="font-weight-bold">Oct 12,2022</span></span>
                                                      <span class="hide-m">|</span><br> <span>Open by: <span class="font-weight-bold">Akhil krishna</span></span> 
                                                      <span class="hide-m">|</span><br>
                                                      <span>
                                                         Assigned to: 
                                                         <select class="blue-select">
                                                            <option selected>Akhil krishna</option>
                                                         </select>
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-5 text-right">
                                             <div class="select-line">
                                                <select class="in-select">
                                                   <option selected>Closed</option>
                                                   <option >Open</option>
                                                </select>
                                                <select class="in-select-priority">
                                                   <option selected>High</option>
                                                   <option>Low</option>
                                                   <option>Medium</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="lead-dt-div">
                                       <div class="row no-gutters">
                                          <div class="col-lg-7">
                                             <div class="d-flex">
                                                <div class="form-check mr-3">
                                                   <input class="form-check-input checkBoxClass" type="checkbox" value="" id="flexCheckChecked">
                                                </div>
                                                <div class="ticket-dt">
                                                   <h5 class="mt-0 mb-1"><span>#5634 -</span> Product launch  </h5>
                                                   <p class="mb-2">Your description here to know the details of campaign</p>
                                                   <div class="date-div">
                                                      <span>Created on: <span class="font-weight-bold">Oct 12,2022</span></span>
                                                      <span class="hide-m">|</span><br> <span>Open by: <span class="font-weight-bold">Akhil krishna</span></span> 
                                                      <span class="hide-m">|</span><br>
                                                      <span>
                                                         Assigned to: 
                                                         <select class="blue-select">
                                                            <option selected>Akhil krishna</option>
                                                         </select>
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-5 text-right">
                                             <div class="select-line">
                                                <select class="in-select">
                                                   <option selected>Closed</option>
                                                   <option >Open</option>
                                                </select>
                                                <select class="in-select-priority">
                                                   <option>High</option>
                                                   <option>Medium</option>
                                                   <option selected>Low</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="lead-dt-div">
                                       <div class="row no-gutters">
                                          <div class="col-lg-7">
                                             <div class="d-flex">
                                                <div class="form-check mr-3">
                                                   <input class="form-check-input checkBoxClass" type="checkbox" value="" id="flexCheckChecked">
                                                </div>
                                                <div class="ticket-dt">
                                                   <h5 class="mt-0 mb-1"><span>#5634 -</span> Product launch  </h5>
                                                   <p class="mb-2">Your description here to know the details of campaign</p>
                                                   <div class="date-div">
                                                      <span>Created on: <span class="font-weight-bold">Oct 12,2022</span></span>
                                                      <span class="hide-m">|</span> <br><span>Open by: <span class="font-weight-bold">Akhil krishna</span></span> 
                                                      <span class="hide-m">|</span><br>
                                                      <span>
                                                         Assigned to: 
                                                         <select class="blue-select">
                                                            <option selected>Akhil krishna</option>
                                                         </select>
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-5 text-right">
                                             <div class="select-line">
                                                <select class="in-select">
                                                   <option selected>Closed</option>
                                                   <option >Open</option>
                                                </select>
                                                <select class="in-select-priority">
                                                   <option>High</option>
                                                   <option selected>Medium</option>
                                                   <option>Low</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="lead-dt-div">
                                       <div class="row no-gutters">
                                          <div class="col-lg-7">
                                             <div class="d-flex">
                                                <div class="form-check mr-3">
                                                   <input class="form-check-input checkBoxClass" type="checkbox" value="" id="flexCheckChecked">
                                                </div>
                                                <div class="ticket-dt">
                                                   <h5 class="mt-0 mb-1"><span>#5634 -</span> Product launch  </h5>
                                                   <p class="mb-2">Your description here to know the details of campaign</p>
                                                   <div class="date-div">
                                                      <span>Created on: <span class="font-weight-bold">Oct 12,2022</span></span>
                                                      <span class="hide-m">|</span> <br><span>Open by: <span class="font-weight-bold">Akhil krishna</span></span> 
                                                      <span class="hide-m">|</span><br>
                                                      <span>
                                                         Assigned to: 
                                                         <select class="blue-select">
                                                            <option selected>Akhil krishna</option>
                                                         </select>
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-5 text-right">
                                             <div class="select-line">
                                                <select class="in-select">
                                                   <option selected>Closed</option>
                                                   <option >Open</option>
                                                </select>
                                                <select class="in-select-priority">
                                                   <option class="redText" selected>High</option>
                                                   <option class="orangeText" >Medium</option>
                                                   <option class="greenText" >Low</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="pagination-div ">
                              <div class="count-show">
                                 Showing 1 of 17 entries
                              </div>
                              <div class="pagination">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                      <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                          <span aria-hidden="true">«</span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                          <span aria-hidden="true">»</span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </nav>
                              </div>
                           </div>
                           </div>
                        </div>
                     </div>
                     <!--end::Container-->
                  </div>
               </div>
            </div>
      </div>
   </div>
   </div>
   </div>
   <!--end::Item-->
   </div>
   </div>
   </section>
   </div>
   </div>
</main>
<!-- Plus Button -->
<div class="modal fade ticket-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header p-0 mb-3">
        <h5 class="modal-title m-0 text-capitalize">Create new Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Contact</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>Akhil Krishna</option>
                  </select>
               </div> 
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Category</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>Akhil Krishna</option>
                  </select>
               </div> 
            </div>
         </div>
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Product name</label>
                  <input class="form-control" type="text" placeholder="Default input">
               </div> 
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Product part name</label>
                  <input class="form-control" type="text" placeholder="Default input">
               </div> 
         </div>
         </div><div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Subject</label>
                  <textarea class="form-control" rows="3" Placeholder="Subject"></textarea>
               </div> 
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Description</label>
                  <textarea class="form-control" rows="3" placeholder="Remarks"></textarea>
               </div> 
            </div>
         </div>
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Group</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>Akhil Krishna</option>
                  </select>
               </div> 
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Agent</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>Product</option>
                  </select>
               </div> 
            </div>
         </div>
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Status</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>Open</option>
                  </select>
               </div> 
            </div>
            <div class="col">
               <div class="form-group">
                  <label for="exampleFormControlSelect1">Priority</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                     <option selected>High</option>
                  </select>
               </div> 
            </div>
         </div>
         <div class="btn-div">
         <a href="#" class="with-border">Cancel</a> <a href="#" class="with-bg">Create ticket</a>
         </div>
      </form>
    </div>
  </div>
{{-- </div> --}}
@endsection
@push('footer.script')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/getlead/tickets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
   .stat_card .dash-stats p.stat_card, .dashboard-sec .dash-stats h5.stat_card {
   color: #fff !important;
   margin-top: 3px !important;
   }
   .stat_card .dash-stats {
   padding: 20px;
   margin-bottom: 4px
   }
   .stat_card .dash-stats .cnt {
   width: 80px;
   height: 80px;
   border-radius: 10px;
   font-size: 20px;
   color: #ffffff;
   padding: 12px;
   font-weight: bold
   }
   .stat_card .dash-stats h5 {
   font-size: 16px;
   text-align: right;
   font-weight: 400 !important
   }
   #container {
   height: 420px;
   }
   .highcharts-figure, .highcharts-data-table table {
   min-width: 360px;
   max-width: 600px;
   margin: 1em auto;
   }
   .highcharts-data-table table {
   font-family: Verdana, sans-serif;
   border-collapse: collapse;
   border: 1px solid #EBEBEB;
   margin: 10px auto;
   text-align: center;
   width: 100%;
   max-width: 500px;
   }
   .highcharts-data-table caption {
   padding: 1em 0;
   font-size: 1.2em;
   color: #555;
   }
   .highcharts-data-table th {
   font-weight: 600;
   padding: 0.5em;
   }
   .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
   padding: 0.5em;
   }
   .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
   background: #f8f8f8;
   }
   .highcharts-data-table tr:hover {
   background: #f1f7ff;
   }
   .pagination-div {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    margin: 5px 0 20px;
}
.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.42rem;
}
.pagination-div ul.pagination {
    margin: 0;
    border: 1px solid #e5e5e5;
}
.pagination-div .page-link {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 600;
    font-size: 11px;
    line-height: 14px;
    color: #808080;
    border: 0;
    margin: 5px;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #FC5E6C;
    background-color: #ffffff;
    border: 1px solid #E4E6EF;
}
.pagination-div .page-item.active .page-link {
    z-index: 3;
    color: #ffffff;
    background-color: #FC5E6C;
    border-color: #FC5E6C;
    border-radius: 3px;
}
</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/funnel3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ url('backend/js/chart.js')}}"></script>
<script>
   let options = {
       chart: {
         type: 'line',
         height: 250,
         zoom: {
            enabled: false
         },
      },
      stroke: {
         curve: "smooth",
         colors: ["#216FED"],
      },
      series: [{
         name: 'sales',
         data: [21,14,17,13,19,16,25,14,16,12,19,15,17]
      }],
      xaxis: {
         engagement: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
      }
   }
   
   var chart = new ApexCharts(document.querySelector("#chart"), options);
   
   chart.render();
</script>
<script type="text/javascript" src="{{ url('backend/js/daterangepicker.js')}}"></script>
<script type="text/javascript">
   var start = moment('2015-01-01');
   var end = moment();
   function cb(start, end) {
       $('#all_date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
   }
   function loadData(){
       var element=$('#ajax-section');
       element.html('Loading...')
       var all_date = $('#all_date').val().split(' - ');
       from_date=all_date[0];
       to_date=all_date[1];
       $.ajax({
               url: BASE_URL + '/user/crm-dashboard',
               type: 'GET',
               data:{
                   start_date:from_date,
                   end_date:to_date
               }
           }).done(function (res) {
                   element.html(res)
           }).fail(function () {
   
           }).always(function (com) {
   
       });
   }
   $(document).ready(function(){
       $('#all_date').on('change',function(){
           loadData();
       })
       BASE_URL = {!! json_encode(url('/')) !!}
   //    loadData();
   
       $('#all_date').daterangepicker({
           startDate: start,
           endDate: end,
           locale:{
               format:'YYYY-MM-DD'
           },
           ranges: {
           'All time': [moment('2015-01-01'), moment()],
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
           }
       }, cb);
   })
</script>
<script type="text/javascript">
   $('#selectAll').click(function(){
    if ($(this).is(":checked")) {
      $(".checkBoxClass").prop('checked', true);
   } else {
      $(".checkBoxClass").prop('checked', false);
   }
   });
   $( document ).ready(function() {
      $(".in-select-priority").each(function(){
         var selval = $(this,"option:selected").val();
         if(selval=='High'){
            $(this).css("color", "#FF555C");
         }
         if(selval=='Low'){
            $(this).css("color", "#29CC97");
         }
         if(selval=='Medium'){
            $(this).css("color", "#FB9341");
         }
      });
   });

   $('.in-select-priority').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      if(valueSelected=='High'){
         $(this).css("color", "#FF555C");
      }
      if(valueSelected=='Low'){
         $(this).css("color", "#29CC97");
      }
      if(valueSelected=='Medium'){
         $(this).css("color", "#FB9341");
      }
   });
</script>
@endpush