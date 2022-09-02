{{-- @extends('layouts.base') --}}
@extends('backend.layout.master')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/getlead/tickets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .stat_card .dash-stats p.stat_card,
    .dashboard-sec .dash-stats h5.stat_card {
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
    
    .highcharts-figure,
    .highcharts-data-table table {
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
    
    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }
    
    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
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
    .view_ticket_details{cursor: pointer;}
</style>
@endsection
@section('content')
<div class="layout-wrapper">
    <div class="content-section p-0">
        <section class="dashboard-sec p-0">
            <div class="content d-flex flex-column flex-column-fluid">
                <div class="d-flex flex-column-fluid">
                    <div class="bg-white w-100 tickets">
                        <div class="container-fluid">
                            <div class="row mt-5" id="ticket_status_counts">
                                <div class="col-lg-2">
                                    <div class="lead-count-div">
                                        <h2 class="total-cnt">{{ count($tickets) }}</h2>
                                        <h5 class="lead-gen-ttile">Total tickets</h5>
                                    </div>
                                </div>
                                @foreach ($ticket_counts as $object)
                                <div class="col-lg-2">
                                    <div class="lead-count-div">
                                        <h2 class="resolved-cnt {{ strtolower($object->name) }}_count">{{ $object->total }}</h2>
                                        <h5 class="lead-gen-ttile">{{ $object->name }}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="form-check all-check">
                                                    <input class="form-check-input checkBoxClass" type="checkbox"
                                                    value="" id="selectAll">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Select All
                                                    </label>
                                                </div>
                                                <form
                                                class="search-f form-inline d-flex justify-content-center md-form form-sm mt-0">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input class="form-control form-control-sm" type="text"
                                                placeholder="Search here" aria-label="Search">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="tbl-h-details">
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
                                                            <li class="navi-item sortby_date" data-sort_by="created_at">
                                                                <a href="#" class="navi-link py-2">
                                                                    <span class="navi-text" id="sort_By1">   Created Date <i class="fa fa-check pl-2 sort_check"></i></span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item sortby_date" data-sort_by="updated_at">
                                                                <a href="#" class="navi-link py-2">
                                                                    <span class="navi-text" id="sort_By2">Updated Date <i class="fa fa-check pl-2 sort_check" style="display:none"></i></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-round-btn" id="btnActions">
                                                <a href="#" data-toggle="modal" data-target="#create_ticket_modal">
                                                    <i class="fa fa-plus"></i>Ticket</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-0 form-group">
                                        <div class="collapse" id="collapseExample" style="">
                                            <div class="card card-body filter-container bg-light-grey">
                                                <form class="" id="getReport" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="input-group with-addon-icon-left"
                                                            id="range_date">
                                                            <input type="text" class="form-control date_picker"
                                                            placeholder="Date" name="all_date"
                                                            autocomplete="off" id="all_date">
                                                            <span class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                            </span>
                                                            <div class="invalid-feedback"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-3">
                                                        {!! Form::select('filter_created_by', $agents,null, ['class' => 'form-control select2 select2-hidden-accessible','id'=>'filter_created_by','placeholder'=>'Opened by']) !!}
                                                    </div>
                                                    <div class="col-sm-3">
                                                        {!! Form::select('filter_assigned_to', $agents,null, ['class' => 'form-control select2 select2-hidden-accessible','id'=>'filter_assigned_to','placeholder'=>'Assigned to']) !!}
                                                    </div>
                                                    
                                                    <div class="filter-round-btn ml-3">
                                                        <a href="#" role="button" onclick="filterData()"
                                                        aria-expanded="false" id="filter">Filter</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabs" class="">
                                    <div id="tabs-1">
                                        @foreach ($tickets as $ticket)
                                        <div class="lead-dt-div">
                                            <div class="row no-gutters">
                                                <div class="col-lg-7">
                                                    <div class="d-flex">
                                                        <div class="form-check mr-3">
                                                            <input class="form-check-input checkBoxClass"
                                                            type="checkbox" value=""
                                                            id="flexCheckChecked">
                                                        </div>
                                                        <div class="ticket-dt">
                                                            <h5 class="mt-0 mb-1 view_ticket_details" data-ticket_id={{ $ticket->id }}><span>#00{{ $ticket->id }} -</span> {{ $ticket->subject }} </h5>
                                                            <p class="mb-2">{{ $ticket->description }}</p>
                                                            <div class="date-div">
                                                                <span>Created on: <span
                                                                    class="font-weight-bold">{{ date('jS M, Y',strtotime($ticket->created_at)) }}</span></span>
                                                                    <span class="hide-m">|</span><br> <span>Opened by:
                                                                        <span class="font-weight-bold">{{ $ticket->ticket_opened_by }}</span></span>
                                                                        <span class="hide-m">|</span><br>
                                                                        <span>
                                                                            Assigned to:
                                                                            {!! Form::select('agents', $agents,$ticket->assigned_to ? $ticket->assigned_to : null, ['class' => 'blue-select','data-ticket_id'=>$ticket->id]) !!}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 text-right">
                                                            <div class="select-line">
                                                                {!! Form::select('ticket_status', $statuses,$ticket->status_id, ['class' => 'in-select','data-ticket_id'=>$ticket->id]) !!}
                                                                {!! Form::select('ticket_priority', $priorities,$ticket->priority_id, ['class' => 'in-select-priority','data-ticket_id'=>$ticket->id]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="pagination-div ">
                                            
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
<!-- Plus Button -->
@include('tickets.create_ticket_modal')
@endsection
@push('footer.script')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/funnel3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ url('backend/js/chart.js') }}"></script>
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
            data: [21, 14, 17, 13, 19, 16, 25, 14, 16, 12, 19, 15, 17]
        }],
        xaxis: {
            engagement: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
        }
    }
    
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    
    chart.render();
</script>
<script type="text/javascript" src="{{ url('backend/js/daterangepicker.js') }}"></script>
<script type="text/javascript">
    var start = moment('2015-01-01');
    var end = moment();
    
    function cb(start, end) {
        $('#all_date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    
    function loadData() {
        var element = $('#ajax-section');
        element.html('Loading...')
        var all_date = $('#all_date').val().split(' - ');
        from_date = all_date[0];
        to_date = all_date[1];
        $.ajax({
            url: BASE_URL + '/user/crm-dashboard',
            type: 'GET',
            data: {
                start_date: from_date,
                end_date: to_date
            }
        }).done(function(res) {
            element.html(res)
        }).fail(function() {
            
        }).always(function(com) {
            
        });
    }
    $(document).ready(function() {
        $('#all_date').on('change', function() {
            loadData();
        })
        BASE_URL = {!! json_encode(url('/')) !!}
        //    loadData();
        
        $('#all_date').daterangepicker({
            startDate: start,
            endDate: end,
            locale: {
                format: 'YYYY-MM-DD'
            },
            ranges: {
                'All time': [moment('2015-01-01'), moment()],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                'month').endOf('month')]
            }
        }, cb);
    })
</script>
<script type="text/javascript">
    $('#selectAll').click(function() {
        if ($(this).is(":checked")) {
            $(".checkBoxClass").prop('checked', true);
        } else {
            $(".checkBoxClass").prop('checked', false);
        }
    });
    $(document).ready(function() {
        $(".in-select-priority").each(function() {
            var selval = $(this, "option:selected").val();
            if (selval == 'High') {
                $(this).css("color", "#FF555C");
            }
            if (selval == 'Low') {
                $(this).css("color", "#29CC97");
            }
            if (selval == 'Medium') {
                $(this).css("color", "#FB9341");
            }
        });
    });
    
    $('.in-select-priority').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if (valueSelected == 'High') {
            $(this).css("color", "#FF555C");
        }
        if (valueSelected == 'Low') {
            $(this).css("color", "#29CC97");
        }
        if (valueSelected == 'Medium') {
            $(this).css("color", "#FB9341");
        }
    });
</script>
@section('script')
<script type="text/javascript">
    
    toastr.options = {
        "closeButton": true,
        "newestOnTop": true,
        "positionClass": "toast-top-right"
    };
    
    function updateTicketsCount() 
    {
        $.ajax({
            type:'GET',
            url:"{{URL::route('tickets-counts')}}",
            
            success:function(data) 
            {
                $("#ticket_status_counts").empty()
                html = '<div class="col-lg-2"><div class="lead-count-div"><h2 class="total-cnt">{{ count($tickets) }}</h2><h5 class="lead-gen-ttile">Total tickets</h5></div></div>'
                
                for (var i=0; i<data.count.length; i++) {
                    console.log(data.count[i]);
                    obj = data.count[i]
                    html+='<div class="col-lg-2"><div class="lead-count-div"><h2 class="total-cnt '+obj['name'].toLowerCase()+'_count">'+obj['total']+'</h2><h5 class="lead-gen-ttile">'+obj['name']+'</h5></div></div>'
                }
                $("#ticket_status_counts").html(html)
            }
        });
    }
    
    function updateTicketStatus(data_params)
    {
        $.ajax({
            type:'POST',
            url:"{{URL::route('update-ticket-status')}}",
            data:data_params,
            success:function(data) 
            {
                toastr.success(data.msg);
            }
        });
        if(data_params.action == "update_status")
        {
            updateTicketsCount()
        }
    }
    
    function filterData()
    {
        $.ajax({
            type:'POST',
            url:"{{URL::route('filter-tickets')}}",
            data:{
                date : $("#all_date").val(),
                opened_by : $("#filter_created_by").val(),
                assigned_to : $("#filter_assigned_to").val(),
            },
            success:function(data) 
            {   
                console.log(data)
                $("#tabs-1").empty();
                $("#tabs-1").html(data.filtered_data)
                toastr.success("Filter applied successfully !!!")
            }
        });
    }
    
    function sortData(sort_param)
    {
        $.ajax({
            type:'POST',
            url:"{{URL::route('sort-tickets')}}",
            data:{
                sort_by : sort_param
            },
            success:function(data) 
            {   
                console.log(data)
                $("#tabs-1").empty();
                $("#tabs-1").html(data.html_code)
                toastr.success("Tickets loaded successfully !!!")
            }
        });
    }
    
    $(document).ready(function() {
        
        $(document).on('change','.blue-select',function()
        {
            let data_params = {   
                ticket_id:$(this).data('ticket_id'), 
                agent_id:$(this).val(), 
                action:"update_agent",
                msg:"Agent assigned successfully !!!",
                "_token": "{{ csrf_token() }}"
            };
            
            updateTicketStatus(data_params)
        })
        
        $(document).on('change','.in-select',function()
        {
            let data_params = {   
                ticket_id:$(this).data('ticket_id'), 
                status_id:$(this).val(), 
                action:"update_status",
                msg:"Status updated successfully !!!",
                "_token": "{{ csrf_token() }}"
            };
            
            updateTicketStatus(data_params)
        })
        
        $(document).on('change','.in-select-priority',function()
        {
            let data_params = {   
                ticket_id:$(this).data('ticket_id'), 
                priority_id:$(this).val(), 
                action:"update_priority",
                msg:"Ticket priority updated successfully !!!",
                "_token": "{{ csrf_token() }}"
            };
            
            updateTicketStatus(data_params)
        })
        
        $(document).on('click','.sortby_date',function()
        {
            sortData($(this).data('sort_by'))
        })
        
        
        $(document).on('click','.view_ticket_details',function()
        {
            $.ajax({
                type:'POST',
                url:"{{URL::route('view-ticket')}}",
                data:{
                    ticket_id : $(this).data('ticket_id')
                },
                success:function(data) 
                {   
                    console.log(data);
                    $("#create_ticket_modal").modal('show')
                }
            });
        })
        
        $(document).on('click','#create_ticket',function()
        {
            $.ajax({
                type:'POST',
                
                // headers: {
                    //     "Accept":'application/json',
                    //     "Content-Type":'application/json',
                    //     "Authorization": "Bearer 2|RDYWY0EMZaEUgrEJ7qVMEcojQXL89oudIjdOkK7p"
                    // },
                    
                    url:"{{URL::route('create-ticket')}}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        'subject' : $("#subject").val(),
                        'description' : $("#description").val(),
                        'status_id' : $("#status_id").val(),
                        'priority_id' : $("#priority_id").val(),
                        'group_id' : $("#group_id").val(),
                        'opened_by' : $("#opened_by").val(),
                        'assigned_to' : $("#assigned_to").val(),
                        'enquiry_id' : $("#enquiry_id").val(),
                    },
                    success:function(data) 
                    {   
                        $("#create_ticket_modal").modal('hide')
                        sortData('created_at')
                    }
                });
            })
            
            
        });
    </script>
    @endsection
    @endpush
    