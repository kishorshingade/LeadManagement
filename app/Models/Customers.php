<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company_name',
        'phone',
        'website',
        'services',
        'start_date',
        'end_date',
        'total_amount',
        'paid_amount',
        'pending_amount',
    ];
}
