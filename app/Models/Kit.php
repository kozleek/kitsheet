<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    /**
     * Get the worksheets for the kit.
     */

    public function worksheets()
    {
        return $this->hasMany(Worksheet::class);
    }
}
