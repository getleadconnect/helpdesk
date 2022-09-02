<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Classes\HtmlContent;
use App\Models\TicketPriority;

trait CreateHtmlCode {
  
    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function HtmlCode($data) {
  
        $agents = User::pluck('first_name','id');
        $statuses = TicketStatus::pluck('name','id');
        $priorities = TicketPriority::pluck('name','id');

        $content = '';

        foreach($data as $ticket)
        {   
            $assigned_to_select = '<select class ="blue-select">';
            $opt = '';
            foreach ($agents as $key => $value) {
                if($key == $ticket->assigned_to)
                { 
                    $opt.='<option value='.$key.' selected>'.$value.'</option>';
                }
                else{
                    $opt.='<option value='.$key.'>'.$value.'</option>';
                }
            }
            $assigned_to_select.=$opt.'</select>';


            $status_select = '<select class ="in-select">';
            $opt = '';
            foreach ($statuses as $key => $value) {
                if($key == $ticket->status_id)
                {
                    $opt.='<option value='.$key.' selected>'.$value.'</option>';
                }
                else{
                    $opt.='<option value='.$key.'>'.$value.'</option>';
                }
            }
            $status_select.=$opt.'</select>';

            $priority_select = '<select class ="in-select-priority">';
            $opt = '';
            foreach ($priorities as $key => $value) {
                if($key == $ticket->priority_id)
                {
                    $opt.='<option value='.$key.' selected>'.$value.'</option>';
                }
                else{
                    $opt.='<option value='.$key.'>'.$value.'</option>';
                }
            }
            $priority_select.=$opt.'</select>';


            $content.='<div class="lead-dt-div">
                        <div class="row no-gutters">
                        <div class="col-lg-7">
                            <div class="d-flex">
                                <div class="form-check mr-3">
                                    <input class="form-check-input checkBoxClass" type="checkbox" value="" id="flexCheckChecked">
                                </div>
                                <div class="ticket-dt">
                                    <h5 class="mt-0 mb-1 view_ticket_details"><span>#00'.$ticket->id.' -</span> '.$ticket->subject.'  </h5>
                                    <p class="mb-2">'.$ticket->description.'</p>
                                    <div class="date-div">
                                    <span>Created on: <span class="font-weight-bold">Oct 12,2022</span></span>
                                    <span class="hide-m">|</span><br> <span>Opened by: <span class="font-weight-bold">'.$ticket->ticket_opened_by.'</span></span> 
                                    <span class="hide-m">|</span><br>
                                    <span>
                                        Assigned to: 
                                        '.$assigned_to_select.'
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 text-right">
                            <div class="select-line">
                                '.$status_select.$priority_select.'
                            </div>
                        </div>
                        </div>
                    </div>';
        }
        return $content;
  
    }
  
}