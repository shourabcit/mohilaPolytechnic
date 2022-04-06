<?php

namespace App\Models;

use App\Models\EquipmentProvide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    use HasFactory, SoftDeletes;

    public function equipmentRequest()
    {
        return $this->belongsToMany(EquipmentProvide::class);
    }
}
