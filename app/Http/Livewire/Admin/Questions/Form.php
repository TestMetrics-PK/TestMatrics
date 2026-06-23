<?php
namespace App\Http\Livewire\Admin\Questions;

use Livewire\Component;
use App\Models\Question;

class Form extends Component
{
    public $questionId;
    public $title;
    public $body;
    public $optionsText;
    public $answer;
    public $explanation;
    public $difficulty = 'medium';
    public $type = 'mcq';

    protected function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'body' => 'required|string',
            'optionsText' => 'nullable|string',
            'answer' => 'nullable|string',
            'explanation' => 'nullable|string',
            'difficulty' => 'nullable|string',
            'type' => 'nullable|string',
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $q = Question::find($id);
            if ($q) {
                $this->questionId = $q->id;
                $this->title = $q->title;
                $this->body = $q->body;
                $this->optionsText = is_array($q->options) ? implode("\n", $q->options) : '';
                $this->answer = $q->answer;
                $this->explanation = $q->explanation;
                $this->difficulty = $q->difficulty;
                $this->type = $q->type;
            }
        }
    }

    public function save()
    {
        $this->validate();

        $options = array_values(array_filter(array_map('trim', explode("\n", $this->optionsText ?? ''))));

        $data = [
            'title' => $this->title,
            'body' => $this->body,
            'options' => $options,
            'answer' => $this->answer,
            'explanation' => $this->explanation,
            'difficulty' => $this->difficulty,
            'type' => $this->type,
        ];

        if ($this->questionId) {
            $q = Question::find($this->questionId);
            if ($q) $q->update($data);
        } else {
            Question::create($data);
        }

        session()->flash('message', 'Question saved.');
        return redirect()->route('admin.questions.index');
    }

    public function render()
    {
        return view('livewire.admin.questions.form');
    }
}
