<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Example extends Component
{
    public $example;
    public $answer;
    public $results;
    public $selectionOfResults;
    public $is_finished;

    /**
     * Mount the component.
     */

    public function mount($example)
    {
        $this->answer = $example->answer;
        $this->is_finished = $example->sheet->is_finished;
    }

    /**
     * Save the answer.
     * Normalize the answer, check if it is correct and update the example.
     */

    public function saveAnswer()
    {
        // normalize the answer
        $answer = $this->answer;
        $answer = Str::replace(' ', '', $answer);
        $answer = Str::replace('.', ',', $answer);

        // check if the answer is correct
        if ($this->answer === '') {
            $is_correct = null;
        } else {
            $is_correct = $answer === $this->example->result ? 1 : 0;
        }

        // update the example
        $this->example->update([
            'answer' => $this->answer,
            'is_correct' => $is_correct,
        ]);
    }

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.example');
    }
}
