<?php

namespace App\Models;

use App\Models\Scopes\ItemScope;

use App\Helpers\Helpers;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;



class User extends Authenticatable
{

  protected $table = 'users';
  public $timestamps = true;

  use HasApiTokens, HasFactory, Notifiable, HasRoles;


  protected $guarded = [];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    //'password' => 'hashed',
  ];

  public function token(): HasOne
  {
      return $this->hasOne(\Laravel\Passport\Token::class, 'user_id');
  }




  public function setImageAttribute($value)
  {
    if ($value && $value->isValid()) {
      if (isset($this->attributes['image']) && $this->attributes['image']) {


        if (file_exists(public_path('storage/app/public/images/user/' . $this->attributes['image']))) {
          \File::delete(public_path('storage/app/public/images/user/' . $this->attributes['image']));
        }
      }

      $helper = new Helpers();
      $image = $helper->upload_single_file($value, 'app/public/images/user/');



      $this->attributes['image'] = $image;
    }
  }




  public function getImageAttribute()
  {
    $image = isset($this->attributes['image']) && $this->attributes['image'] ? 'storage/app/public/images/user/' . $this->attributes['image'] : asset('https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y');
    return asset($image);
  }


  public function setPasswordAttribute($value)
  {
    if ($value) {
      $this->attributes['password'] = bcrypt($value);
    }
  }






  public function notifeable()
  {
    return $this->morphMany(Notification::class, 'notifeable');
  }

  public function notifications()
  {
    return $this->hasMany(Notification::class);
  }




  public function devices()
  {

    return $this->hasMany(Device::class);
  }

  public function feeds()
  {

    return $this->hasMany(Feed::class,"user_id");
  }


  public function providers()
  {
    return $this->hasMany(Provider::class);
  }



}
