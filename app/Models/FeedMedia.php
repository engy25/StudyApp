<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helpers;

class FeedMedia extends Model
{

  use HasFactory;
  protected $table = 'feed_media';
  protected $guarded = [];
  public $timestamps = true;


  public function setMediaAttribute($value)
  {
    if ($value && $value->isValid()) {
      if (isset($this->attributes['media']) && $this->attributes['media']) {

        if (file_exists(public_path('storage/app/public/images/media/' . $this->attributes['media']))) {
          \File::delete(public_path('storage/app/public/images/media/' . $this->attributes['media']));
        }
      }

      $helper = new Helpers();
      $media = $helper->upload_single_file($value, 'app/public/images/media/');

      $this->attributes['media'] = $media;

      $this->attributes['type'] = $this->getFileType($value);
    }
  }


  public function getMediaAttribute()
  {
    return asset('storage/app/public/images/media/' . $this->attributes['media']);

  }

  private function getFileType($file)
  {
    $extension = $file->getClientOriginalExtension();
    if (in_array($extension, ["docx", "doc", "txt", "wpd", "pages", "pdf"])) {
      return "document";
    } elseif (in_array($extension, ["mp4", "ogx", "oga", "ogv", "ogg", "webm"])) {
      return "video";
    } else {
      return "image";

    }

  }










































}
