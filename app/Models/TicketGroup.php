<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketGroup extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id','name','description','created_by','updated_by'];
}
