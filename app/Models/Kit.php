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
            if($canEdit == false) {
                break;
            }
            else{
                foreach ($sheet->examples as $example) {
                    if ($example->answer != null) {
                        $canEdit = false;
                        break;
                    }
                }
            }
        }

        return $canEdit;
    }

    /**
     * Get the settings examples only positive attribute.
     */

    public function getSettingsExamplesOnlyPositiveAttribute()
    {
        return in_array('onlyPositive', $this->settings_examples);
    }

    /**
     * Get the settings examples with parentheses attribute.
     */

    public function getSettingsExamplesWithParenthesesAttribute()
    {
        return in_array('withParentheses', $this->settings_examples);
    }

    /**
     * Get the settings examples selection of results attribute.
     */

    public function getSettingsExamplesSelectionOfResultsAttribute()
    {
        return in_array('selectionOfResults', $this->settings_examples);
    }
}
