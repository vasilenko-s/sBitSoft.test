<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
            'surname', 'category'
        ];

    /**
     * Get the teacher's user.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    /**
     * The subjects that belong to the teacher
     */
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }
}
