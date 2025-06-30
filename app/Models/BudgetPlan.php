<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{
    use HasFactory;
     protected $table = 'budget_plan';

    protected $primaryKey = 'pid'; // ถ้า primary key ของคุณชื่อ pid

    public $timestamps = false; // ถ้าไม่มี created_at / updated_at
     protected $fillable = [
        'plan_no',
        'plan_title',
        'plan_budget',
        'budget_id',
        'plan_budget_bal',
        'dep_title'
    ];

}
