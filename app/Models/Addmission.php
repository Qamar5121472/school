<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addmission extends Model
{
    use HasFactory;

    public function doc(){
        return $this->belongsTo(Document::class,'document_id','id');
    }


}
