<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FocusSession extends Model {

  use HasFactory;
	protected $table = 'focus_sessions';
	public $timestamps = true;
  protected $guarded = [];

	public function feature()
	{
		return $this->belongsTo('App\Models\\Feature');
	}

}
