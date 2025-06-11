<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEmployment extends Model
{
    /** @use HasFactory<\Database\Factories\TypeEmploymentFactory> */
    use HasFactory;

    protected $fillable = ['name'];
}
