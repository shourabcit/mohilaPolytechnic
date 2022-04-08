<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clearence extends Model
{
    use HasFactory;

    /**
     * CLEARENCE RELATION WITH USER
     * ONE TO MANY
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
