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
		return $this->belongsTo(Feature::class,"feature_id");
	}

  public function events()
	{
		return $this->hasMany(FocusSessionEvent::class,"focus_session_id");
	}

}
