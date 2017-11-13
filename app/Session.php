<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Session
 *
 * @mixin \Eloquent
 */
class Session extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function form()
    {
        return $this->belongsTo('Form');
    }
}
