<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    // Un projet a un auteur et un seul
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
