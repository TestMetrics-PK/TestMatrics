<?php
namespace App\Http\Livewire\Test;

use Livewire\Component;
use App\Models\Question;

class MockTest extends Component
{
    public $questions = [];
    public $answers = [];
    public $current = 0;
    public $finished = false;
    public $score = 0;

    public function mount()
    {
        $qs = Question::inRandomOrder()->limit(20)->get();
        $this->questions = $qs->map(function ($q) {
            return [
                'id' => $q->id,
                'body' => $q->body,
                'options' => $q->options ?? [],
                'answer' => $q->answer
            ];
        })->toArray();
    }

    public function next()
    {
        if (!isset($this->answers[$this->current])) return;
        $currentQ = $this->questions[$this->current];
        if ((string)$this->answers[$this->current] === (string)$currentQ['answer']) $this->score++;

        if ($this->current + 1 >= count($this->questions)) {
            $this->finished = true;
        } else {
            $this->current++;
        }
    }

    public function render()
    {
        return view('livewire.test.mock');
    }
}
