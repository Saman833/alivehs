<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    /** @use HasFactory<\Database\Factories\ClubFactory> */
    use HasFactory;
    protected $fillable = ["image",'name', 'description', 'number_of_members', 'owner_id'];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
