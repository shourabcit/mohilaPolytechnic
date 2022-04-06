<?php

namespace App\Models;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EquipmentProvide extends Model
{
    use HasFactory, SoftDeletes;



    /**
     * EQUIPMENT PROVIDE HAS A RELATIONSHIP WITH USERS
     * ONE TO MANY 
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
