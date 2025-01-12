<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // To enable mass assignment, we need to define the fillable property on the model.
    protected $fillable = ['title', 'description', 'long_description'];
}
