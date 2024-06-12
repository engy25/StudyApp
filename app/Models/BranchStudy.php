<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchStudy extends Model
{
    use HasFactory;
    protected $guarded=[];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($branchStudy) {
            // Check if the study is related to any branchStudyUsers
            if ($branchStudy->branchStudyUsers()->count() > 0) {
                dd(1);
                return false; // Prevent deletion
            } else {

                return true; // Allow deletion
            }
        });
    }

    public function study()
    {
      return $this->belongsTo(Study::class,"study_id");
    }

    public function branchStudyUsers()
    {
        return $this->hasMany(BranchStudyUser::class, 'branch_id');
    }

}
