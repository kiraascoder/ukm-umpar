<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['ukm_id', 'photo_path'];

    public function ukm()
    {
        return $this->belongsTo(Ukm::class);
    }
}
