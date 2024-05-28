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

    protected $casts = [
        'range_numbers' => 'array',
        'range_operations' => 'array',
        'settings_examples' => 'array',
    ];

    /**
     * Get the sheets for the kit.
     */

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }

    /**
     * Can the kit be edited? The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function getCanEditAttribute()
    {
        $canEdit = true;
        foreach ($this->sheets as $sheet) {
            if ($sheet->is_finished == 1) {
                $canEdit = false;
                break;
            }
        }

        return $canEdit;
    }
}
