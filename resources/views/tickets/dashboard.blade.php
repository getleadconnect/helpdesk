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

        .view_ticket_details {
            cursor: pointer;
        }
    </style>
    <style>
        .tracking .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 20px;
            border-radius: 10px
        }

        .tracking .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 5% !important
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 20%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        #progressbar li:before {
            width: 30px;
            height: 30px;
            line-height: 32px;
            display: block;
            font-size: 10px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px;
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 3px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 14px;
            z-index: -1;
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after,
        #progressbar li:nth-child(4):after {
            left: -50%
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .tracking .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px
        }

        .tracking .icon-content {
            padding-bottom: 20px
        }


        .accordion {
            font-size: 1rem;
            margin: 0 auto;
            border-radius: 5px;
        }

        .accordion-header,
        .accordion-body {
            background: white;
        }

        .accordion-header {
            padding: 1em 3em;
            background: #fff;
            cursor: pointer;
            transition: all .3s;
            font-style: normal;
            font-weight: 500;
            font-size: 12px;
            line-height: 25px;
            font-feature-settings: 'pnum'on, 'lnum'on;
            color: #616161;
            border-radius: 8px
        }

        .accordion__item {
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(31, 61, 91, 0.06);
            margin-bottom: 20px;
        }

        .accordion__item .accordion__item {
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .accordion-header:hover {
            background: #e6e6e6;
            position: relative;
            z-index: 5;
            border-radius: 8px;
            ;
        }

        .accordion-body {
            background: #fcfcfc;
            color: #353535;
            display: none;
        }

        .accordion-body__contents {
            padding: 3em;
            font-size: 11px;

            font-style: normal;
            font-weight: normal;
            line-height: 150%;
            color: #4A5F75;
        }

        .accordion__item.active:last-child .accordion-header {
            border-radius: none;
        }

        .accordion:first-child>.accordion__item>.accordion-header {
            border-bottom: 1px solid transparent;
        }

        .accordion__item>.accordion-header:after {
            content: "";
            font-family: IonIcons;
            font-size: 1.2em;
            float: right;
            position: relative;
            top: -2px;
            transition: .3s all;
            transform: rotate(0deg);
            background: url({{ url('images/plus.svg') }});
            width: 20px;
            height: 20px;
        }

        .accordion__item.active .accordion-header:after {
            content: "";
            font-family: IonIcons;
            font-size: 1.2em;
            float: right;
            position: relative;
            top: -2px;
            transition: .3s all;
            transform: rotate(0deg);
            background: url({{ url('images/minus.svg') }});
            width: 20px;
            height: 20px;
        }

        .accordion__item.active>.accordion-header:after {
            transform: rotate(-180deg);
        }

        .accordion__item.active .accordion-header {
            background: #e6e6e6;
            border-radius: 8px 8px 0px 0px;
            color: #616161
        }

        .accordion__item .accordion__item .accordion-header {
            background: #f1f1f1;
            color: #353535;
        }

        .ul-scroll {
            height: 200px;
            margin: 0 auto;
            overflow: hidden;
        }

        .ul-scroll:hover {
            overflow-y: scroll;
        }

        .ul-scroll::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        .ul-scroll::-webkit-scrollbar-track {
            background: #EBF4FF
        }

        /* Handle */
        .ul-scroll::-webkit-scrollbar-thumb {
            background: #FC5E6C;
            border-radius: 26px;
            max-height: 50%;
            height: 50%;
        }

        .ul-scroll::-webkit-scrollbar-button {
            height: 50px;
        }

        /* Handle on hover */
        .tracking-scroll::-webkit-scrollbar-thumb:hover {}

        .main-wrapper-change {
            padding: 0px !important;
            margin-top: 0px !important;
            background-color: #fff !important;
        }

        .card {
            border: 1px solid #e9e9ef !important;
        }

        .timeline-new .timeline-action a {
            border: 0;
            background: #FFE0E2;
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center !important;
            padding: 0 !important;
            color: #FE5F6C;
        }

        i.fa.fa-trash {
            color: #FE5F6C;
        }

        .timeline-new .timeline-header {
            background: none;
        }

        .panel-title.new-panel {
            background: #29CC97 !important;
        }

        .timeline-title:has(> .fa-edit) {
            background: #CCECFF !important;
        }

        a.timeline-title.edit-timeline {
            background: #CCECFF;
            color: #0692E3 !important;
        }

        .image-div {
            width: 130px;
            height: 130px;
            margin: 0 auto;
        }

        .timeline-header.tl-panel-hdr-lght-fb-blue,
        .timeline-new .timeline-header {
            background: none !important;
        }

        .timeline-new li>.timeline-panel .panel-title {
            width: 31px !important;
            padding: 5px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            /* border-radius: 5px; */
        }

        .timeline-badge {
            border: none !important;
            color: #fff !important;
            background: #29cc97 !important;
        }

        .timeline-badge.tl-badge-bdr-blue {
            border: none !important;
            background: #0692E3 !important;
            color: #fff !important;
        }

        .timeline-badge.tl-badge-bdr-fb-blue {
            color: #fff !important;
            border: none !important;
            background: #00bcd4 !important;
        }

        .timeline-new .timeline-header .user-img {
            width: 25px !important;
            height: 25px !important;
            font-size: 10px !important;
            font-weight: 400 !important;
        }

        .timeline-new .timeline-badge {
            width: 32px !important;
            height: 32px !important;
        }

        .timeline-new .timeline-action a {

            width: 27px;
            height: 27px;
        }

        .tl-new-top-sec .tl-user-info .tl-user-details {
            padding: 0 20px !important;
        }

        .tl-new-top-sec .tl-user-info .tl-user-adrs {
            padding: 5px 20px !important;
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li {
            padding: 10px 20px !important;
        }

        .tl-new-top-sec .tl-user-info .tl-details {
            padding: 0 !important;
        }

        .tl-new-top-sec .tl-user-info {
            height: auto !important;
        }

        .tl-new-top-sec .tl-user-info .tl-user-adrs ul li i {
            width: 23px !important;
            height: 23px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #95A6BD;
            color: #fff;
        }

        .tl-new-top-sec .tl-user-info .tl-user-adrs ul li {
            padding: 8px 0;
            font-size: 13px;
            font-weight: 500;
            line-height: 17px;
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li p {
            font-weight: 400;
            margin: 0;
            color: #4e4e4e;
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li .select2-container {
            text-align: left;
            font-size: 12px;
            /* background: rgba(251, 147, 65, 0.1) !important; */
            border-bottom: 1px solid #dee2e6;
            /* box-sizing: border-box; */
            border-radius: 0px;
        }

        .select2-selection__rendered {
            padding-left: 0px !important;
            border-radius: 0px !important;
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li .select2-container--default .select2-selection--single {
            border: 0;
            height: 30px;
            margin-bottom: 0;
            border-radius: 100px;
        }

        .tl-user-info .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #FB9341 transparent transparent transparent !important;
        }

        .tl-user-info .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* color: #FB9341 !important; */
            text-transform: capitalize !important
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li .select2-container--default .select2-selection--single {
            background: #fff;
            border: 1px solid #e4e4e4;
        }

        .ordertag {
            color: black;
            border: 0;
            padding: 0.5rem 0.75rem;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .tl-new-top-sec .tl-user-info .tl-details ul li label:first-child {
            padding-right: 20px;
        }

        ul.timeline-opt {
            list-style: none;
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        ul.timeline-opt a {
            padding: 0;
            border: none;
        }

        .timeline-new {
            padding-top: 0 !important;
        }

        label.input-boxes input,
        label.input-boxes select {
            border: 0;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            margin-bottom: 0;
        }

        label.input-boxes {
            width: 60% !important;
        }

        .gotoDeal {
            padding: 0px 0px !important;
            font-weight: 700 !important;
            text-transform: none !important;
            border-width: 0px;
            border-style: none;
            border-color: rgb(255, 255, 255);
            border-image: none;
            border-radius: 0px;
        }

        .tel-a {
            padding: 0px 0px !important;
            color: black !important;
            font-weight: 500 !important;
        }
    </style>
    <style>
        .deal_timeline ul.timeline {
    list-style-type: none;
    position: relative;
}
.deal_timeline li a {
    margin-left: 4%;
    display: unset!important;
}
ul p{
    margin-left: 6%;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
    margin-left: -6%;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
    margin-left: -6%;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
.notes-container{
    overflow-x: scroll;
    height: 330px;
}
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
                                                <h2 class="resolved-cnt {{ strtolower($object->name) }}_count">
                                                    {{ $object->total }}</h2>
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
                                                        <a data-toggle="collapse" href="#collapseExample" title="Filter"
                                                            role="button" aria-expanded="false"
                                                            aria-controls="collapseExample"><i
                                                                class="fa fa-filter"></i>Filter</a>
                                                    </div>
                                                    <div class="text-right chart-filter my-0">
                                                        <div class="input-group with-addon-icon-left" style="display:none">
                                                            <select class="form-control "
                                                                style="    height: 36px;font-size: 12px;font-weight: 500;
color: #1d1d1d;margin-right:30px"
                                                                id="sort_by">
                                                                <option value="1" selected="">Created Date</option>
                                                                <option value="2">Updated Date</option>
                                                            </select>
                                                        </div>
                                                        <div class="main-round-btn" id="btnActions"
                                                            style="background: #aeafbd;">
                                                            <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa fa-sort"></i>Sort by</a>
                                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                <ul class="navi navi-hover">
                                                                    <li class="navi-item sortby_date"
                                                                        data-sort_by="created_at">
                                                                        <a href="#" class="navi-link py-2">
                                                                            <span class="navi-text" id="sort_By1"> Created
                                                                                Date <i
                                                                                    class="fa fa-check pl-2 sort_check"></i></span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item sortby_date"
                                                                        data-sort_by="updated_at">
                                                                        <a href="#" class="navi-link py-2">
                                                                            <span class="navi-text" id="sort_By2">Updated
                                                                                Date <i class="fa fa-check pl-2 sort_check"
                                                                                    style="display:none"></i></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="main-round-btn" id="btnActions">
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#create_ticket_modal">
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
                                                                {!! Form::select('filter_created_by', $agents, null, [
                                                                    'class' => 'form-control select2 select2-hidden-accessible',
                                                                    'id' => 'filter_created_by',
                                                                    'placeholder' => 'Opened by',
                                                                ]) !!}
                                                            </div>
                                                            <div class="col-sm-3">
                                                                {!! Form::select('filter_assigned_to', $agents, null, [
                                                                    'class' => 'form-control select2 select2-hidden-accessible',
                                                                    'id' => 'filter_assigned_to',
                                                                    'placeholder' => 'Assigned to',
                                                                ]) !!}
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
                                                                        <h5 class="mt-0 mb-1 view_ticket_details"
                                                                            data-ticket-id={{ $ticket->id }}>
                                                                            <span>#00{{ $ticket->id }} -</span>
                                                                            {{ $ticket->subject }}
                                                                        </h5>
                                                                        <p class="mb-2">{{ $ticket->description }}</p>
                                                                        <div class="date-div">
                                                                            <span>Created on: <span
                                                                                    class="font-weight-bold">{{ date('jS M, Y', strtotime($ticket->created_at)) }}</span></span>
                                                                            <span class="hide-m">|</span><br> <span>Opened
                                                                                by:
                                                                                <span
                                                                                    class="font-weight-bold">{{ $ticket->ticket_opened_by }}</span></span>
                                                                            <span class="hide-m">|</span><br>
                                                                            <span>
                                                                                Assigned to:
                                                                                {!! Form::select('agents', $agents, $ticket->assigned_to ? $ticket->assigned_to : null, [
                                                                                    'class' => 'blue-select',
                                                                                    'data-ticket_id' => $ticket->id,
                                                                                ]) !!}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 text-right">
                                                                <div class="select-line">
                                                                    {!! Form::select('ticket_status', $statuses, $ticket->status_id, [
                                                                        'class' => 'in-select',
                                                                        'data-ticket_id' => $ticket->id,
                                                                    ]) !!}
                                                                    {!! Form::select('ticket_priority', $priorities, $ticket->priority_id, [
                                                                        'class' => 'in-select-priority',
                                                                        'data-ticket_id' => $ticket->id,
                                                                    ]) !!}
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
    @include('tickets.timeline_modal')
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

            function updateTicketsCount() {
                $.ajax({
                    type: 'GET',
                    url: "{{ URL::route('tickets-counts') }}",

                    success: function(data) {
                        $("#ticket_status_counts").empty()
                        html =
                            '<div class="col-lg-2"><div class="lead-count-div"><h2 class="total-cnt">{{ count($tickets) }}</h2><h5 class="lead-gen-ttile">Total tickets</h5></div></div>'

                        for (var i = 0; i < data.count.length; i++) {
                            console.log(data.count[i]);
                            obj = data.count[i]
                            html += '<div class="col-lg-2"><div class="lead-count-div"><h2 class="total-cnt ' + obj[
                                    'name'].toLowerCase() + '_count">' + obj['total'] +
                                '</h2><h5 class="lead-gen-ttile">' + obj['name'] + '</h5></div></div>'
                        }
                        $("#ticket_status_counts").html(html)
                    }
                });
            }

            function updateTicketStatus(data_params) {
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('update-ticket-status') }}",
                    data: data_params,
                    success: function(data) {
                        toastr.success(data.msg);
                    }
                });
                if (data_params.action == "update_status") {
                    updateTicketsCount()
                }
            }

            function filterData() {
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('filter-tickets') }}",
                    data: {
                        date: $("#all_date").val(),
                        opened_by: $("#filter_created_by").val(),
                        assigned_to: $("#filter_assigned_to").val(),
                    },
                    success: function(data) {
                        console.log(data)
                        $("#tabs-1").empty();
                        $("#tabs-1").html(data.filtered_data)
                        toastr.success("Filter applied successfully !!!")
                    }
                });
            }

            function sortData(sort_param) {
                $.ajax({
                    type: 'POST',
                    url: "{{ URL::route('sort-tickets') }}",
                    data: {
                        sort_by: sort_param
                    },
                    success: function(data) {
                        console.log(data)
                        $("#tabs-1").empty();
                        $("#tabs-1").html(data.html_code)
                        toastr.success("Tickets loaded successfully !!!")
                    }
                });
            }

            $(document).ready(function() {

                $('.summernote').summernote({
                    height: 100,   //set editable area's height
                    codemirror: { // codemirror options
                    theme: 'monokai'
                    }
                });
                var edit = function() {
                    $('.click2edit').summernote({focus: true});
                };

                var save = function() {
                var markup = $('.click2edit').summernote('code');
                    $('.click2edit').summernote('destroy');
                };

                $(document).on('change', '.blue-select', function() {
                    let data_params = {
                        ticket_id: $(this).data('ticket_id'),
                        agent_id: $(this).val(),
                        action: "update_agent",
                        msg: "Agent assigned successfully !!!",
                        "_token": "{{ csrf_token() }}"
                    };

                    updateTicketStatus(data_params)
                })

                $(document).on('change', '.in-select', function() {
                    let data_params = {
                        ticket_id: $(this).data('ticket_id'),
                        status_id: $(this).val(),
                        action: "update_status",
                        msg: "Status updated successfully !!!",
                        "_token": "{{ csrf_token() }}"
                    };

                    updateTicketStatus(data_params)
                })

                $(document).on('change', '.in-select-priority', function() {
                    let data_params = {
                        ticket_id: $(this).data('ticket_id'),
                        priority_id: $(this).val(),
                        action: "update_priority",
                        msg: "Ticket priority updated successfully !!!",
                        "_token": "{{ csrf_token() }}"
                    };

                    updateTicketStatus(data_params)
                })

                $(document).on('click', '.sortby_date', function() {
                    sortData($(this).data('sort_by'))
                })

                

                $(document).on('click', '.view_ticket_details', function() {

                    _ticket_id = $(this).data('ticket-id')
                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('view-ticket') }}",
                        data: {
                            ticket_id: $(this).data('ticket-id')
                        },
                        success: function(data) {
                            $("#enquiry_notes").html('')
                            $("#enquiry_notes").html(data.notes)
                            $("#time_line_modal").modal('show')
                        }
                    });
                })

                $(document).on('click', '#save_note', function() {
                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('save-ticket-note') }}",
                        data: {
                            note: $("#summernote").summernote('code').replace(/<\/?[^>]+(>|$)/g, ""),
                            ticket_id : _ticket_id
                        },
                        success: function(data) {
                            $(".deal_timeline").empty()
                            $(".deal_timeline").html(data.html_content)
                            toastr.success("Note added successfully !!!")
                        }
                    });
                })

                $(document).on('click', '#create_ticket', function() {
                    $.ajax({
                        type: 'POST',

                        // headers: {
                        //     "Accept":'application/json',
                        //     "Content-Type":'application/json',
                        //     "Authorization": "Bearer 2|RDYWY0EMZaEUgrEJ7qVMEcojQXL89oudIjdOkK7p"
                        // },

                        url: "{{ URL::route('create-ticket') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'subject': $("#subject").val(),
                            'description': $("#description").val(),
                            'status_id': $("#status_id").val(),
                            'priority_id': $("#priority_id").val(),
                            'group_id': $("#group_id").val(),
                            'opened_by': $("#opened_by").val(),
                            'assigned_to': $("#assigned_to").val(),
                            'enquiry_id': $("#enquiry_id").val(),
                        },
                        success: function(data) {
                            $("#create_ticket_modal").modal('hide')
                            sortData('created_at')
                        }
                    });
                })


            });
        </script>
    @endsection
@endpush
