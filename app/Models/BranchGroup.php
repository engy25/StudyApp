<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchGroup extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function branch()
    {
      return $this->belongsTo(BranchStudy::class,"branch_id");
    }
}
