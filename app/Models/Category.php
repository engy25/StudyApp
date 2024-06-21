<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helpers;
class Category extends Model {

  use HasFactory;
	protected $table = 'categories';
  protected $guarded = [];
	public $timestamps = true;


  public function setIconAttribute($value)
  {
    if ($value && $value->isValid()) {
      if (isset($this->attributes['icon']) && $this->attributes['icon']) {


        if (file_exists(public_path('storage/app/public/images/category/' . $this->attributes['icon']))) {
          \File::delete(public_path('storage/app/public/images/category/' . $this->attributes['icon']));
        }
      }

      $helper = new Helpers();
      $image = $helper->upload_single_file($value, 'app/public/images/category/');



      $this->attributes['icon'] = $image;
    }
  }


  public function getIconAttribute()
  {
    return asset('storage/app/public/images/category/' . $this->attributes['icon']);

  }

  public function groups()
  {
    return $this->hasMany(Group::class,"category_id");
  }

}
