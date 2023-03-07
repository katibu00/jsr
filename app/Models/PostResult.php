<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResult extends Model
{
    use HasFactory;

    public function postResultSubmit(){
        return $this->belongsTo(PostResultSubmit::class, 'post_submit_id','id');
    }
}
