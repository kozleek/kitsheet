<?php

namespace App\Livewire;

use Livewire\Component;

class KitWorksheets extends Component
{
    public $kit;

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.kit-worksheets', [
            'worksheets' => $this->kit->worksheets
        ]);
    }
}
