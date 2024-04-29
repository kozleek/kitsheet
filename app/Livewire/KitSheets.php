<?php

namespace App\Livewire;

use Livewire\Component;

class KitSheets extends Component
{
    public $kit;

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.kit-sheets', [
            'sheets' => $this->kit->sheets
        ]);
    }
}
