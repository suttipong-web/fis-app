<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionReservBudget extends Model
{
    use HasFactory;
    protected $table = 'session_reserv_budgets'; // ชื่อตาราง

    public $timestamps = true; // ถ้ามี created_at /
    protected $fillable = [
        'session_id',
        'cmuitaccount',
        'budget_id',
        'plan_id',
        'amount',
        'dep_id'
    ];
}
