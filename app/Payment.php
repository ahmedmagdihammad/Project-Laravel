<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $fillable = ['student', 'branch', 'offer', 'amount'];

    public function getOffer(){
        return $this->belongsTo("App\Offer", "offer");
    }

    public function getBranch(){
        return $this->belongsTo("App\Branch", "branch");
    }

    public function getStudent(){
        return $this->belongsTo("App\Student", "student", "id");
    }
}
