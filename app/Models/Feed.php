<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model {

  use HasFactory;
	protected $table = 'feeds';

  protected $guarded = [];
	public $timestamps = true;

  public function media()
  {
    return $this->hasMany(FeedMedia::class,"feed_id");
  }
  public function user(){
    return $this->belongsTo(User::class,"user_id");
  }

  public function sharedFeeds(){
    return $this->hasMany(Share::class,"shared_feed_id");
  }

  public function likes()
  {
      return $this->morphMany(FeedLike::class, 'likeable');
  }
  public function favourites()
  {
      return $this->morphMany(Favourite::class, 'favoriteable');
  }

  public function comments()
  {
      return $this->morphMany(CommentFeed::class, 'commenteable');
  }



}
