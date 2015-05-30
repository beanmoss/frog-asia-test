<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frog extends Model
{
    protected $fillable = ['name', 'gender', 'is_dead'];
}