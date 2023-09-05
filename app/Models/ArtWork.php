<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;

class ArtWork extends Model
{    use HasFactory;
    public function artist(){
        return  $this->belongsTo(Artist::class);
    }

}
