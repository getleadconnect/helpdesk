<?php

namespace App\Http\Controllers\API;

use Auth;
use Validator;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Models\TicketPriority;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketCollection;
use App\Http\Controllers\API\BaseController as BaseController;

class EnquiriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries = new TicketCollection(Enquiry::orderBy('id','DESC')->paginate(10));
        return $this->sendResponse($enquiries, 'Enquiries data loaded successfully.');
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
            'vchr_enquiry_feedback' => 'required',
            'fk_int_enquiry_type_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = Enquiry::create([
                    'vchr_enquiry_feedback' => $request->vchr_enquiry_feedback,
                    'fk_int_enquiry_type_id' => $request->fk_int_enquiry_type_id,
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
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        return $this->sendResponse($enquiry, 'Data retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        $validator = Validator::make($request->all(), [
            'vchr_enquiry_feedback' => 'required',
            'fk_int_enquiry_type_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),400);       
        }
        try{
                 $data = $enquiry->update([
                    'vchr_enquiry_feedback' => $request->vchr_enquiry_feedback,
                    'fk_int_enquiry_type_id' => $request->fk_int_enquiry_type_id,
                    'updated_by' => auth('sanctum')->id(),
                ]);
                return $this->sendResponse($enquiry, 'Successfully Updated');
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
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return $this->sendResponse($enquiry, 'Successfully deleted');
    }
}
