<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Instrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
