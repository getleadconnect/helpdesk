<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EnquiryCollection;
use App\Http\Controllers\API\BaseController as BaseController;

class TicketController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = new EnquiryCollection(Ticket::orderBy('id','DESC')->paginate(10));
        return $this->sendResponse($tickets, 'Tickets data loaded successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'description' => 'required',
            'enquiry_id' => 'required',
            'group_id' => 'required',
            'agent_id' => 'required',
            'status_id' => 'required',
            'user_id' => 'required',
            'priority_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = Ticket::create([
                    'subject' => $request->subject,
                    'description' => $request->description,
                    'enquiry_id' => $request->enquiry_id,
                    'user_id' => $request->user_id,
                    'group_id' => $request->group_id,
                    'agent_id' => $request->agent_id,
                    'priority_id' => $request->priority_id,
                    'status_id' => $request->status_id,
                    'created_by' => auth('sanctum')->id(),
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($data, 'Successfully Created');
            }    
            catch(Exception $e)  
            {  
                if (!($e instanceof SQLException)) {
                    app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
                }
                return $this->sendError('Error.', ['error'=>'Whoops something went wrong'],500);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return $this->sendResponse($ticket, 'Data retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'description' => 'required',
            'enquiry_id' => 'required',
            'group_id' => 'required',
            'agent_id' => 'required',
            'user_id' => 'required',
            'status_id' => 'required',
            'priority_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = $ticket->update([
                    'subject' => $request->subject,
                    'description' => $request->description,
                    'enquiry_id' => $request->enquiry_id,
                    'group_id' => $request->group_id,
                    'user_id' => $request->user_id,
                    'agent_id' => $request->agent_id,
                    'priority_id' => $request->priority_id,
                    'status_id' => $request->status_id,
                    'created_by' => auth('sanctum')->id(),
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($ticket, 'Successfully updated');
            }    
            catch(Exception $e)  
            {  
                if (!($e instanceof SQLException)) {
                    app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
                }
                return $this->sendError('Error.', ['error'=>'Whoops something went wrong'],500);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return $this->sendResponse($ticket, 'Successfully deleted');
    }
}
