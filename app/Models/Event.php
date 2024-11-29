<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;
    protected $fillable = ['image','name', 'description', 'happening_time', 'club_id'];
    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
