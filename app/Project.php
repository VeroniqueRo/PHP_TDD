<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Un projet a un auteur
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
