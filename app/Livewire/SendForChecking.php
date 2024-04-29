<?php

namespace App\Livewire;

use Livewire\Component;

class SendForChecking extends Component
{
    public $sheet;

    /**
     * Send the sheet for checking.
     * Mark the sheet as finished and save the answers.
     */

    public function store()
    {
        // save the answers
        foreach ($this->sheet->examples as $example) {
            $example->answer = isset($example->answer) ? $example->answer : '?';
            $example->is_correct = $example->is_correct ? 1 : 0;
            $example->save();
        }

        // mark the sheet as finished
        $this->sheet->is_finished = true;
        // save the sheet
        $this->sheet->save();

        // redirect to the sheet
        $this->redirect(route('sheet.show', $this->sheet->id));
    }

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.send-for-checking');
    }
}
