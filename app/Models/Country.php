<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Helpers\Helpers;

class Country extends Model implements TranslatableContract

{

  protected $table = 'countries';
  public $timestamps = true;

  use SoftDeletes, HasFactory, Translatable;

  public $translatedAttributes = ['name'];

  protected $dates = ['deleted_at'];
  protected $guarded = [];
  protected static function boot()
{
    parent::boot();

    static::deleting(function ($country) {
        // Check if the country is related to any cities or users
        $relatedCitiesCount = $country->cities()->count();
        $relatedUsersCount = User::where("country_code", $country->country_code)->count();

        if ($relatedCitiesCount > 0 || $relatedUsersCount > 0) {
            dd(1);
            return false; // Prevent deletion
        } else {
            // If not related to any cities or users, delete translations and allow deletion
            $country->translations()->delete();
            return true; // Allow deletion
        }
    });
}











  // public function setFlagAttribute($value)
  // {
  //   if ($value && $value->isValid()) {
  //     if (isset($this->attributes['flag']) && $this->attributes['flag']) {


  //       if (file_exists(public_path('storage/app/public/images/countryFlag/' . $this->attributes['flag']))) {
  //         \File::delete(public_path('storage/app/public/images/countryFlag/' . $this->attributes['flag']));
  //       }
  //     }

  //     $helper = new Helpers();
  //     $image = $helper->upload_single_file($value, 'app/public/images/countryFlag/');



  //     $this->attributes['flag'] = $image;
  //   }
  // }


  public function getFlagAttribute()
  {
    return asset('storage/app/public/images/countryFlag/' . $this->attributes['flag']);

  }


  public function translations(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
      return $this->hasMany(CountryTranslation::class);
  }
  public function currency()
  {
    return $this->belongsTo(Currency::class);
  }
  public function cities()
  {
      return $this->hasMany(City::class);
  }


  public function nameTranslation($locale)
  {
    $translation = $this->translations->where('locale', $locale)->first();

    return $translation ? $translation->name : $this->name;
  }

}
