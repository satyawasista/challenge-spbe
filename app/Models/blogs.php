<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{

    use HasFactory;
    protected $guarded =[];

    protected $hidden=[];

    public function user(){
        return $this->belongsTo(user::class);
    }

    
}
