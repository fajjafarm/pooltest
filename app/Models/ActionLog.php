<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    protected $fillable = [
        'action_type', 
        'escalation', 
        'check_id',
        'issue',
        'comments', 
        'resolved_status',
        'actioned_by'
    ];
}