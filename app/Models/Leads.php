<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'requirement',
        'date',
        'status',
    ];

    public function followUps()
    {
        return $this->hasOne(FollowUp::class, 'LeadId');
    }
    
}
