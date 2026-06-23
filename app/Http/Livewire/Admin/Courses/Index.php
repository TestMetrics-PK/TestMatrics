<?php
namespace App\Http\Livewire\Admin\Courses;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $query = Course::query();
        if ($this->search) $query->where('title', 'like', '%'.$this->search.'%');
        $courses = $query->orderBy('id','desc')->paginate(10);
        return view('livewire.admin.courses.index', ['courses' => $courses]);
    }
}
