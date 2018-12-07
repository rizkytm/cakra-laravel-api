<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'user_id', 'judul', 'isi', 'cover', 'jenis', 'archive_id' 
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function archive()
    {
        return $this->belongsTo(User::class);
    }
}
