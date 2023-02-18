<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = ['selected', 'status']; // assuming these are the relevant fields
    
    public function applicants(){
        return $this->hasMany(Applicant::class);
    }
}
