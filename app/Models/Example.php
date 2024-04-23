<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the worksheet that owns the example.
     */

    public function worksheet()
    {
        return $this->belongsTo(Worksheet::class);
    }
}
