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

    /**
     * Can the kit be edited? The kit can be edited if all sheets are empty (examples have no answers).
     */

    public function getCanEditAttribute()
    {
        $canEdit = true;
        foreach ($this->sheets as $sheet) {
            if ($sheet->examples()->whereNotNull('answer')->exists()) {
                $canEdit = false;
                break;
            }
        }

        return $canEdit;
    }

    /**
     * Min and max values for the range of numbers.
     */

    public function getRangeMinAttribute()
    {
        return json_decode($this->range_numbers)->min;
    }

    public function getRangeMaxAttribute()
    {
        return json_decode($this->range_numbers)->max;
    }

    public function getRangeDecimalsAttribute()
    {
        return json_decode($this->range_numbers)->decimals;
    }

    /**
     * Operations for the range of numbers.
     */

    public function getOperationAddAttribute()
    {
        return in_array('add', json_decode($this->range_operations));
    }

    public function getOperationSubtractAttribute()
    {
        return in_array('subtract', json_decode($this->range_operations));
    }

    public function getOperationMultiplyAttribute()
    {
        return in_array('multiply', json_decode($this->range_operations));
    }

    public function getOperationDivideAttribute()
    {
        return in_array('divide', json_decode($this->range_operations));
    }
}
