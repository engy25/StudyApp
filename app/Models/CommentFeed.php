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

}
