<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Support\ExampleSupport;

class Example extends Component
{
    public $example;
    public $answer;
    public $results;
    public $selectionOfResults;
    public $isFinished;

    /**
     * Mount the component.
     */

    public function mount($example)
    {
        $this->answer = $example->answer;
        $this->isFinished = $example->sheet->is_finished;
    }

    /**
     * Save the answer.
     * Normalize the answer, check if it is correct and update the example.
     */

    public function saveAnswer()
    {
        ExampleSupport::saveAnswer($this->example, $this->answer);
    }

    /**
     * Render the component.
     */

    public function render()
    {
        return view('livewire.example');
    }
}
