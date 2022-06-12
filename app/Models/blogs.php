<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{

    use HasFactory;
    protected $guarded=[
        'id','created_at','updated_at'
    ];

    protected $fillable = [
        'title',
        'description',
        'photo',
        'user_id'
    ];

    protected $hidden=[];

    public function user(){
        return $this->belongsTo(user::class);
    }
    
   /* public function tags(){
        return $this->belongsToMany(Tags::class)->wherePivot(['name']);
    } */
    
}
;
