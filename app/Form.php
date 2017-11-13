<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Form
 *
 * @mixin \Eloquent
 */
class Form extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'anonymous'
    ];

    protected function questions()
    {
        return $this->hasMany('Question');
    }
}
