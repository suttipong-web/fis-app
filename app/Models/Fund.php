<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory; 
    protected $table = 'fund'; // ชื่อตาราง
    protected $primaryKey = 'fund_id';
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [
        'fund_name'        
    ];
}
