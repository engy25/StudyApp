<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Goal extends Model
{

  use HasFactory;
  protected $table = 'goals';
  protected $guarded = [];
  public $timestamps = true;

  public function user()
  {
    return $this->belongsTo(User::class, "user_id");
  }

  //Today's target
  public function scopeDailyGoals($query)
  {
    return $query
    ->where("type", "daily")
    ->whereDate("created_at",Carbon::today());
  }

  //General Goals
  public function scopeGeneralGoals($query)
  {
    return $query->where("type", "general")->where("name", "!=", null);
  }

}
