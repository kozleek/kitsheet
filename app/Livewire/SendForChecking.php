<?php

namespace App\Livewire;

use Livewire\Component;

class SendForChecking extends Component
{
    public $worksheet;

    /**
     * Send the worksheet for checking.
     * Mark the worksheet as finished and save the answers.
     */

    public function store()
    {
        // save the answers
        foreach ($this->worksheet->examples as $example) {
            $example->answer = isset($example->answer) ? $example->answer : '?';
            $example->is_correct = $example->is_correct ? 1 : 0;
            $example->save();
        }

        // mark the worksheet as finished
        $this->worksheet->is_finished = true;
        // save the worksheet
        $this->worksheet->save();

        // redirect to the worksheet
        $this->redirect(route('worksheet.show', $this->worksheet->id));
    }

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.send-for-checking');
    }
}
