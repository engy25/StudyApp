<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FocusSessionEvent extends Model {

  use HasFactory;
	protected $table = 'focus_session_events';
  protected $guarded = [];
	public $timestamps = true;

  public function session()
  {
      return $this->belongsTo(FocusSession::class);
  }

}
