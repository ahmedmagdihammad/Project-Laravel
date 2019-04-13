<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public function getDescription(){
        return $this->belongsTo("App\Description", "job");
    }
}
