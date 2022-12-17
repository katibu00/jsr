<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResultSubmit extends Model
{
    use HasFactory;

    public function lga(){
        return $this->belongsTo(LGA::class, 'lga_id','id');
    }
    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id','id');
    }
    public function pu(){
        return $this->belongsTo(PU::class, 'pu_id','id');
    }
}
