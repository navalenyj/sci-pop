<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizScore extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id' , 'score'
    ];

    public function users(){
        return $this->belongsTo('App\Models\User' , 'user_id' , 'id');
    }


}
