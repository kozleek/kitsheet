<?php

namespace App\Livewire;

use Livewire\Component;

class WorksheetEdit extends Component
{
    public $worksheet;
    public $name;

    /**
     * Mount the component.
     */

    public function mount($worksheet)
    {
        $this->name = $worksheet->name;
    }

    /**
     * Store the worksheet.
     * Update the name of the worksheet.
     */

    public function store()
    {
        $this->worksheet->update([
            'name' => $this->name,
        ]);
    }

    /**
     * Render the component.
     */

    public function render()
    {
        ray($this->name);
        return view('livewire.worksheet-edit');
    }
}
