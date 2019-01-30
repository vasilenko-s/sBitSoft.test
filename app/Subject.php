<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The teachers that belong to the subject.
     */
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }
}
