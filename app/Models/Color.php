<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Color extends Model
{
  use HasFactory;

  protected $guarded = [];

  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($color) {
      if (
        $color->vechileBrandColor()->count() > 0

      ) {
        // Log the reason for deletion prevention
        Log::info("Cannot delete Color with ID {$color->id}, It is related to other tables.");
        // Throw an exception to indicate why deletion can't proceed
        throw new \Exception("Cannot delete Color, It is related to other tables.");
      }
    });
  }


  public function vechileBrandColor()
  {
    return $this->hasMany(VechileBrandColor::class);
  }




}
