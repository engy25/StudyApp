<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CommentFeed extends Model {

  use HasFactory;
  protected $guarded = [];
	protected $table = 'comment_feeds';
	public $timestamps = true;

  public function commenteable()
	{
		return $this->morphTo();
	}

  public function user()
  {
    return $this->belongsTo(User::class,"user_id");
  }

  public function replies()
  {
      return $this->hasMany(CommentFeed::class, 'parent_comment_id');
  }

  public function parentComment()
  {
      return $this->belongsTo(CommentFeed::class, 'parent_comment_id');
  }

}
