<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
