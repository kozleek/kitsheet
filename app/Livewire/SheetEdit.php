<?php

namespace App\Livewire;

use Livewire\Component;

class SheetEdit extends Component
{
    public $sheet;
    public $name;

    /**
     * Mount the component.
     */

    public function mount($sheet)
    {
        $this->name = $sheet->name;
    }

    /**
     * Store the sheet.
     * Update the name of the sheet.
     */

    public function store()
    {
        $this->sheet->update([
            'name' => $this->name,
        ]);
    }

    /**
     * Render the component.
     */

    public function render()
    {
        ray($this->name);
        return view('livewire.sheet-edit');
    }
}
