<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\User;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketStatusCollection;
use App\Http\Controllers\API\BaseController as BaseController;

class TicketStatusController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = new TicketStatusCollection(TicketStatus::orderBy('name','ASC')->paginate(10));
        return $this->sendResponse($statuses, 'Ticket Statuses data loaded successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = TicketStatus::create([
                    'name'   => $request->name,
                    'vendor_id'   => $request->vendor_id,
                    'description' => $request->description,
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
     * @param  \App\Models\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TicketStatus $ticketStatus)
    {
        return $this->sendResponse($ticketStatus, 'Data retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketStatus $ticketStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketStatus $ticketStatus)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = $ticketStatus->update([
                    'vendor_id'   => $request->vendor_id,
                    'name' => $request->name,
                    'description' => $request->description, 
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($ticketStatus, 'Successfully Updated');
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
     * @param  \App\Models\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketStatus $ticketStatus)
    {
        $ticketStatus->delete();
        return $this->sendResponse($ticketStatus, 'Successfully deleted');
    }
}
