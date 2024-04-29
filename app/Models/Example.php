<?php

namespace App\Models;

use App\Models\Sheet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the sheet that owns the example.
     */

    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }
}
