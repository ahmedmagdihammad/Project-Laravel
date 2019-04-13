<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $table = "descriptions";
    protected $fillable = ['title', 'debartment'];

    public function getDepartment(){
        return $this->belongsTo("App\Department", "department");
    }
}
