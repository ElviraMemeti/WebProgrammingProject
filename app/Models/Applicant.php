<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $table='applicants';
    protected $fillable =['name','Surname','studentId','faculty','Programme',
     'Academic_Year','email','phone', 'status'];






//    public function scopeFilter($query, array $filters){
//     if ($filters['tag'] ?? false)
//     {
//         $query->where('tags','like','%'.request('tag').'%');
//     }

//     if ($filters['search'] ?? false)
//     {
//         $query->where('title','like','%'.request('search').'%')
//         ->orWhere('description','like','%'.request('search').'%')
//         ->orWhere('tags','like','%'.request('search').'%');
//     }
//    }
}





