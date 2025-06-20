<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{   use  HasFactory;
    protected $table = 'budgets'; // ชื่อตาราง
    protected $primaryKey = 'budget_id'; // ถ้าใช้ id อยู่แล้วไม่จำเป็นต้องระบุ
    public $timestamps = true; // ถ้ามี created_at / updated_
       protected $fillable = [
        'by_id',
        'budget_no',
        'fund_id',
        'dep_id',
        'activity_id',
        'category',
        'budget_money',
        'type_id',
        'is_withdraw',
        'budge_balance',
        'budget_detail',   
        'gid',
        'plan',
        'bdate',
        'budget_detail',
        'is_withdraw'
    ];
}
