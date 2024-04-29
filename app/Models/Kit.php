<?php

namespace App\Models;

use App\Models\Sheet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kit extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    /**
     * Get the sheets for the kit.
     */

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
