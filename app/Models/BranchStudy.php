<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchStudy extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function study()
    {
      return $this->belongsTo(Study::class,"study_id");
    }

}
