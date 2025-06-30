<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetSetting extends Model
{
    use HasFactory;
    protected $table = 'budget_setting'; // ชื่อตาราง
    protected $primaryKey = 'by_id'; // ถ้าใช้ id อยู่แล้วไม่จำเป็นต้องระบุ
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [  
        'by_id',           
        'by_year',
        'by_detail',
        'is_status'    
    ];
}
