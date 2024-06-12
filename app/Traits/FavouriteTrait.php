<?php

namespace App\Traits;
use App\Models\Favourite;


trait FavouriteTrait
{

  public function IsFavourite($isShared,$shareId,$feed_id)
  {
    if ($isShared) {
      $fav = Favourite::where('favoriteable_type', 'App\Models\Share')
        ->where('favoriteable_id', $shareId)->where('user_id', auth('api')->user()->id)->first();
     return ($fav) ? $fav = true : $fav = false;

    } else {
      $fav = Favourite::where('favoriteable_type', 'App\Models\Feed')
        ->where('favoriteable_id', $feed_id)->where('user_id', auth('api')->user()->id)->first();
     return ($fav) ? $fav = true : $fav = false;
    }
  }



}
