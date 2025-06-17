<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    use HasFactory;
    protected $table = 'budget_type'; // ชื่อตาราง
    protected $primaryKey = 'type_id'; // ถ้าใช้ id อยู่แล้วไม่จำเป็นต้องระบุ
    public $timestamps = true; // ถ้ามี created_at /
    protected $fillable = [
        'type_name',
        'type_detail' 
    ];
}
