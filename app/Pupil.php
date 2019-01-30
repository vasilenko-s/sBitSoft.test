<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname'
    ];


    /**
     * Get the pupil's user.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
