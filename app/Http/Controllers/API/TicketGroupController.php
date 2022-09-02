<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\TicketGroup;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketGroupCollection;
use App\Http\Controllers\API\BaseController as BaseController;

class TicketGroupController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = new TicketGroupCollection(TicketGroup::orderBy('id','DESC')->paginate(10));
        return $this->sendResponse($groups, 'Ticket groups data loaded successfully.');
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
                 $data = TicketGroup::create([
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
     * @param  \App\Models\TicketGroup  $ticketGroup
     * @return \Illuminate\Http\Response
     */
    public function show(TicketGroup $ticketGroup)
    {
        return $this->sendResponse($ticketGroup, 'Data retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketGroup  $ticketGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketGroup $ticketGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketGroup  $ticketGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketGroup $ticketGroup)
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
                 $data = $ticketGroup->update([
                    'vendor_id'   => $request->vendor_id,
                    'name' => $request->name,
                    'description' => $request->description, 
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($ticketGroup, 'Successfully Updated');
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
     * @param  \App\Models\TicketGroup  $ticketGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketGroup $ticketGroup)
    {
        $ticketGroup->delete();
        return $this->sendResponse($ticketGroup, 'Successfully deleted');
    }
}
