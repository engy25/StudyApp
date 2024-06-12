<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helpers;
class Study extends Model
{
    use HasFactory;

    protected $guarded=[];



    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($study) {
            // Check if the study is related to any branchStudyUsers 
            if ($study->branchStudyUsers()->count() > 0) {
                dd(1);
                return false; // Prevent deletion
            } else {

                return true; // Allow deletion
            }
        });
    }

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
      $image = 'storage/app/public/images/studyIcon/' . $this->attributes['icon'];
      return asset($image);
    }




    public function branches()
    {
      return $this->hasMany(BranchStudy::class,"study_id");
    }

    public function branchStudyUsers()
    {
        return $this->hasManyThrough(BranchStudyUser::class, BranchStudy::class, 'study_id', 'branch_id', 'id', 'id');
    }
}
