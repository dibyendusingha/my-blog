<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Admin extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Form::class);
    }
}
