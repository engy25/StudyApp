<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedLike extends Model
{

  use HasFactory;
  protected $table = 'feed_likes';

  protected $guarded = [];
  public $timestamps = true;

  public function likeable()
  {
    return $this->morphTo();
  }

  public function user()
  {
    return $this->belongsTo(User::class, "user_id");
  }


}
