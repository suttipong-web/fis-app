<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;   
    protected $table = 'group'; // ชื่อตาราง
    protected $primaryKey = 'gid';
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [
        'group_name'        
    ];
}
