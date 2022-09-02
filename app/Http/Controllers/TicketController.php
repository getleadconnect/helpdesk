<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Enquiry;
use App\Models\TicketStatus;
use App\Classes\HtmlContent;
use App\Models\TicketGroup;
use App\Models\TicketPriority;
use App\Traits\CreateHtmlCode;

class TicketController extends Controller
{
    use CreateHtmlCode;

    public function index()
    {   
        $tickets = Ticket::leftJoin('users as t1','t1.id','tickets.opened_by')
                           ->leftJoin('users as t2','t2.id','tickets.assigned_to')
                           ->select('tickets.id','subject','description','t1.first_name as ticket_opened_by','t2.first_name as ticket_assigned_to','assigned_to','status_id','priority_id','tickets.created_at')
                           ->latest('tickets.created_at')
                           ->get();

        $ticket_counts = Ticket::groupBy('status_id')
                        ->leftJoin('ticket_statuses','ticket_statuses.id','status_id')
                        ->select('status_id','ticket_statuses.name',DB::raw('count(*) as total'))
                        ->get();

        $agents = User::pluck('first_name','id');
        $statuses = TicketStatus::pluck('name','id');
        $priorities = TicketPriority::pluck('name','id');
        $enquiries = Enquiry::pluck('remarks','id');
        $groups = TicketGroup::pluck('name','id');
        return view('tickets.dashboard',compact('tickets','statuses','priorities','agents','ticket_counts','groups','enquiries'));
    }

    public function getTicketCounts(Request $request)
    {
        $count = Ticket::groupBy('status_id')
                        // ->with('status') 
                        ->leftJoin('ticket_statuses','ticket_statuses.id','status_id')
                        ->select('status_id','ticket_statuses.name',DB::raw('count(*) as total'))
                        ->get();

        return response()->json(['count'=>$count]);
    }   

    public function updateTicketStatus(Request $request)
    {
        $ticket = Ticket::where('id',$request->ticket_id)->first();

        switch ($request->action) 
        {
            case 'update_agent':
                    $ticket->update([
                        'agent_id' => $request->agent_id
                    ]);
                break;
            
            case 'update_status':
                $ticket->update([
                    'status_id' => $request->status_id
                ]);
            break;

            case 'update_priority':
                $ticket->update([
                    'priority_id' => $request->priority_id
                ]);
            break;
            
            default:
                # code...
                break;
        }

        return response()->json(['msg'=>$request->msg]);
    }

    public function filterTickets(Request $request)
    {
       
        $date = explode(' - ',$request->date);

        $date_from = $date[0]." 00:00:00";
        $date_to = $date[1]." 23:59:59";

        $data = Ticket::where(function($q) use($request){
                        $request->opened_by ? $q->where('opened_by',$request->opened_by) : '' ;
                        })
                        ->where(function($q1) use($request){
                        $request->assigned_to ? $q1->where('assigned_to',$request->assigned_to) : '' ;
                        })
                        ->whereDate('tickets.created_at', [$date_from, $date_to])
                        ->leftJoin('users as t1','t1.id','tickets.opened_by')
                        ->leftJoin('users as t2','t2.id','tickets.assigned_to')
                        ->select('tickets.id','subject','description','t1.first_name as ticket_opened_by','t2.first_name as ticket_assigned_to','assigned_to','status_id','priority_id','tickets.created_at')
                        ->latest('tickets.created_at')
                        ->get();

        return response()->json(['filtered_data'=>$this->HtmlCode($data)]);
    }

    public function sortTickets(Request $request)
    {
        $tickets = Ticket::leftJoin('users as t1','t1.id','tickets.opened_by')
        ->leftJoin('users as t2','t2.id','tickets.assigned_to')
        ->select('tickets.id','subject','description','t1.first_name as ticket_opened_by','t2.first_name as ticket_assigned_to','assigned_to','status_id','priority_id','tickets.created_at')
        ->latest('tickets.'.$request->sort_by)
        ->get();
        return response()->json(['html_code'=>$this->HtmlCode($tickets)]);
    }

    public function createTicket(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'description' => 'required',
            'group_id' => 'required',
            'assigned_to' => 'required',
            'status_id' => 'required',
            'enquiry_id' => 'required',
            'opened_by' => 'required',
            'priority_id' => 'required',
        ]);
   
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        try{
                 $data = Ticket::create([
                    'subject' => $request->subject,
                    'description' => $request->description,
                    'opened_by' => $request->opened_by,
                    'assigned_to' => $request->assigned_to,
                    'group_id' => $request->group_id,
                    'priority_id' => $request->priority_id,
                    'status_id' => $request->status_id,
                    'enquiry_id'=> $request->enquiry_id,
                    'created_by' => 2,
                    'updated_by' => 2,
                ]);
                return response()->json(['success'=>'New ticket created successfully !!!']);
            }    
            catch(Exception $e)  
            {  
                if (!($e instanceof SQLException)) {
                    app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
                }
                return response()->json('Error.', ['error'=>'Whoops something went wrong'],500);
            }

    }

    public function viewTicket(Request $request)
    {
      $ticket = Ticket::where('id',$request->ticket_id)->first();
      return response()->json(['ticket'=>$ticket]);
    }
}