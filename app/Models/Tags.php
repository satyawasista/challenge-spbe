<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $guarded =[
        'id','created_at','updated_at'
        
    ];

    protected $fillable = [
        'name_tags',
    ];

    protected $hidden=[];
    
   /* public function blog(){
        return $this->belongsToMany(blogs::class)->withPivot(['name']);
    } */

}