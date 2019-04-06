<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['id','created_at','updated_at','user_id'];
}
