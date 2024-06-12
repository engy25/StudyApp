<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Group extends Model {

  use HasFactory;
	protected $table = 'groups';
  protected $guarded = [];
	public $timestamps = true;

  public function users()
  {
    return $this->belongsToMany(User::class,"group_users","group_id","user_id");
  }

  public function getUsersCountAttribute()
  {
      return $this->users()->count();
  }

  public function focusSessions()
  {
    return $this->hasMany(FocusSession::class,"group_id");
  }


  public function getLiveAttribute()
  {
      return $this->focusSessions()->where("is_online", 1)->count();
  }


  public function feature()
  {
    return $this->belongsTo(Feature::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
