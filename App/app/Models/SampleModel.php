<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model
{
    protected $table = 'sample';

    public function sample()
    {
        return [];
    }
}
