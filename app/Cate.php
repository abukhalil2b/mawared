<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
	protected $fillable = ['title','description'];
    public $timestamps = false;
}
