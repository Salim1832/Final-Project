<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];

   /*  static function getAllStudent() 
    {
        //query select SQL
        $students = DB::select('select * from students');
        return $students;
    } */
}
