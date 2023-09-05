<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtWork;
class Artist extends Model
{  use HasFactory;
    public function artWork(){
        return $this->hasMany(ArtWork::class);
    }

}
