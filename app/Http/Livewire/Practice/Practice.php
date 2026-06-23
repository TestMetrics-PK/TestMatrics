<?php
namespace App\Http\Livewire\Practice;

use Livewire\Component;
use App\Models\Question;

class Practice extends Component
{
    public $questions = [];
    public $currentIndex = 0;
    public $selected = null;
    public $score = 0;
    public $finished = false;

    public function mount()
    {
        $qs = Question::inRandomOrder()->limit(10)->get();

        if ($qs->isEmpty()) {
            // fallback sample questions if DB empty
            $this->questions = [
                [
                    'id' => 1,
                    'body' => 'What is 2 + 2?',
                    'options' => ['3','4','5','6'],
                    'answer' => '4'
                ],
                [
                    'id' => 2,
                    'body' => 'What is the capital of Spain?',
                    'options' => ['Paris','Madrid','Lisbon','Rome'],
                    'answer' => 'Madrid'
                ]
            ];
        } else {
            $this->questions = $qs->map(function ($q) {
                return [
                    'id' => $q->id,
                    'body' => $q->body,
                    'options' => $q->options ?? [],
                    'answer' => $q->answer,
                ];
            })->toArray();
        }
    }

    public function submit()
    {
        if ($this->finished) return;

        $current = $this->questions[$this->currentIndex];
        if ($this->selected === null) return;

        if ((string)$this->selected === (string)$current['answer']) {
            $this->score++;
        }

        $this->selected = null;
        if ($this->currentIndex + 1 >= count($this->questions)) {
            $this->finished = true;
        } else {
            $this->currentIndex++;
        }
    }

    public function resetPractice()
    {
        $this->currentIndex = 0;
        $this->score = 0;
        $this->finished = false;
    }

    public function render()
    {
        return view('livewire.practice.index');
    }
}
