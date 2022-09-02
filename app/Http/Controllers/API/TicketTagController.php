<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\TicketTag;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketTagCollection;
use App\Http\Controllers\API\BaseController as BaseController;

class TicketTagController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket_tag = new TicketTagCollection(TicketTag::orderBy('id','DESC')->paginate(10));
        return $this->sendResponse($ticket_tag, 'Ticket groups data loaded successfully.');
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
            'color' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = TicketTag::create([
                    'name'   => $request->name,
                    'vendor_id'   => $request->vendor_id,
                    'color' => $request->color,
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
     * @param  \App\Models\TicketTag  $ticketTag
     * @return \Illuminate\Http\Response
     */
    public function show(TicketTag $ticketTag)
    {
        return $this->sendResponse($ticketTag, 'Data retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketTag  $ticketTag
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketTag $ticketTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketTag  $ticketTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketTag $ticketTag)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'name' => 'required',
            'color' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = $ticketTag->update([
                    'vendor_id'   => $request->vendor_id,
                    'name' => $request->name,
                    'color' => $request->color, 
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($ticketTag, 'Successfully Updated');
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
     * @param  \App\Models\TicketTag  $ticketTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketTag $ticketTag)
    {
        $ticketTag->delete();
        return $this->sendResponse($ticketTag, 'Successfully deleted');
    }
}
