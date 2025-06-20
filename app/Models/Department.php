<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;   
    protected $table = 'department'; // ชื่อตาราง
    protected $primaryKey = 'dep_id';
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [
        'dep_name',
        'dep_parent',
        'title',
        'dep_title'
    ];
}
