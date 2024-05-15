<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchStudyUser extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function study()
    {
      return $this->belongsTo(Study::class,"study_id");
    }

    public function branch()
    {
      return $this->belongsTo(BranchStudy::class,"branch_id");
    }
    public function user()
    {
      return $this->belongsTo(User::class,"user_id");
    }
}
