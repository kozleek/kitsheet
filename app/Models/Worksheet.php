<?php

namespace App\Models;

use App\Observers\WorksheetObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worksheet extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     */

    protected static function boot(): void
    {
        parent::boot();
        self::observe(WorksheetObserver::class);
    }

    /**
     * Get the kit that owns the worksheet.
     */

    public function kit()
    {
        return $this->belongsTo(Kit::class);
    }

    /**
     * Get the examples for the worksheet.
     */

    public function examples()
    {
        return $this->hasMany(Example::class);
    }

    /**
     * Get attributes for correct answers counter
     */

    public function getCorrectAnswersCounterAttribute()
    {
        return $this->examples->where('is_correct', true)->count();
    }

    /**
     * Get attributes for wrong answers counter
     */

    public function getWrongAnswersCounterAttribute()
    {
        return $this->examples->where('is_correct', false)->count();
    }

    /**
     * Get attributes for empty answers counter
     */

    public function getEmptyAnswersCounterAttribute()
    {
        return $this->examples->where('answer', '?')->count();
    }
}
