<?php
namespace App\Http\Livewire\Admin\Questions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Question;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $selected = [];
    protected $paginationTheme = 'tailwind';
    protected $listeners = ['questionDeleted' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $q = Question::find($id);
        if ($q) {
            $q->delete();
        }
        $this->emit('questionDeleted');
    }

    public function bulkDelete()
    {
        if (empty($this->selected)) return;
        Question::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->emit('questionDeleted');
    }

    public function render()
    {
        $query = Question::query();
        if ($this->search) {
            $query->where('title', 'like', '%'.$this->search.'%')
                  ->orWhere('body', 'like', '%'.$this->search.'%');
        }

        $questions = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.admin.questions.index', [
            'questions' => $questions
        ]);
    }
}
