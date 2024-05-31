<?php

namespace App\Models;

use App\Observers\SheetObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sheet extends Model
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
        self::observe(SheetObserver::class);
    }

    /**
     * Get the finished sheets.
     */

    public function scopeFinished($query)
    {
        return $query->where('is_finished', 1);
    }

    /**
     * Get the kit that owns the sheet.
     */

    public function kit()
    {
        return $this->belongsTo(Kit::class);
    }

    /**
     * Get the examples for the sheet.
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
        $count = $this->examples->where('is_correct', '1')->count();
        return $count ? $count : 0;
    }

    /**
     * Get attributes for wrong answers counter
     */

    public function getWrongAnswersCounterAttribute()
    {
        $count = $this->examples->where('is_correct', '0')->count();
        return $count ? $count : 0;
    }

    /**
     * Get attributes for empty answers counter
     */

    public function getEmptyAnswersCounterAttribute()
    {
        $count = $this->examples->where('answer', '?')->count();
        return $count ? $count : 0;
    }

    /**
     * Get attributes for percentage of correct answers
     */

    public function getPercentageOfCorrectAnswersAttribute()
    {
        $count = $this->examples->count();
        $correct = $this->correctAnswersCounter;
        return $count ? round($correct / $count * 100) : 0;
    }
}
