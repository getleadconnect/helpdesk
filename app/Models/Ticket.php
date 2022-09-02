<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['subject','description','enquiry_id','group_id',
                          'opened_by','status_id','priority_id','created_by','updated_by','assigned_to'];
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\TicketStatus');
    }
}
