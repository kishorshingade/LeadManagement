<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;

    protected $fillable = [
        'LeadId',
        'followUp1',
        'followUp2',
        'followUp3',
        'followUp4',
        'followUp5',
    ];

    public function lead()
    {
        return $this->belongsTo(Leads::class, 'LeadId');
    }
}
