<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Generalgoal extends Model {

  use HasFactory;
	protected $table = 'generalgoals';
  protected $guarded = [];
	public $timestamps = true;

}
