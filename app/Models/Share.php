<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model {

  use HasFactory;
	protected $table = 'shares';
  protected $guarded = [];
	public $timestamps = true;

  public function feed()
  {
    return $this->belongsTo(Feed::class,"shared_feed_id");
  }

  public function sharingUser()
  {
    return $this->belongsTo(User::class,"sharing_user_id");
  }

  public function likes()
  {
      return $this->morphMany(FeedLike::class, 'likeable');
  }

  public function comments()
  {
      return $this->morphMany(CommentFeed::class, 'commenteable');
  }

  public function favourites()
  {
      return $this->morphMany(Favourite::class, 'favoriteable');
  }
}
