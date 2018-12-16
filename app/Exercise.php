<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
