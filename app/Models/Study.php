<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helpers;
class Study extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function setIconAttribute($value)
    {
      if ($value && $value->isValid()) {
        if (isset($this->attributes['icon']) && $this->attributes['icon']) {


          if (file_exists(public_path('storage/app/public/images/studyIcon/' . $this->attributes['icon']))) {
            \File::delete(public_path('storage/app/public/images/studyIcon/' . $this->attributes['icon']));
          }
        }

        $helper = new Helpers();
        $image = $helper->upload_single_file($value, 'app/public/images/studyIcon/');



        $this->attributes['icon'] = $image;
      }
    }

    public function getIconAttribute()
    {
      $image = isset($this->attributes['icon']) && $this->attributes['image'] ? 'storage/app/public/images/studyIcon/' . $this->attributes['icon'] : asset('https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y');
      return asset($image);
    }


    public function branches()
    {
      return $this->hasMany(BranchStudy::class,"study_id");
    }
}
