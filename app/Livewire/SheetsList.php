<?php

namespace App\Livewire;

use Livewire\Component;

class SheetsList extends Component
{
    public $kit;

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.sheets-list', [
            'sheets' => $this->kit->sheets
        ]);
    }
}
