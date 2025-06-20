<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category'; // ชื่อตาราง
    protected $primaryKey = 'cate_id';
    public $timestamps = true; // ถ้ามี created_at / updated_at   
    protected $fillable = [
        'cate_title'        
    ];
}
