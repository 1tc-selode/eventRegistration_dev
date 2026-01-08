<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Event extends Model
{
    use HasFactory, SoftDeletes;

        protected $fillable = [
        'title',
        'date',
        'location',
        'description',
        'max_attendees',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'registrations')
        ->withPivot('status', 'registered_at')
        ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
