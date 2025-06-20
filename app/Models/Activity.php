<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
 
    protected $table = 'activity'; // ชื่อตาราง
    protected $primaryKey = 'activity_id';
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [
        'activity_name',
        'activity_detail'           
    ];
}
