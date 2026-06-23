<?php
namespace App\Http\Livewire\Admin\Courses;

use Livewire\Component;
use App\Models\Course;

class Form extends Component
{
    public $courseId;
    public $title;
    public $slug;
    public $description;
    public $published = false;

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|string',
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $c = Course::find($id);
            if ($c) {
                $this->courseId = $c->id;
                $this->title = $c->title;
                $this->slug = $c->slug;
                $this->description = $c->description;
                $this->published = $c->published;
            }
        }
    }

    public function save()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'published' => $this->published,
        ];
        if ($this->courseId) {
            Course::find($this->courseId)->update($data);
        } else {
            Course::create($data);
        }
        session()->flash('message', 'Course saved.');
        return redirect()->route('admin.courses.index');
    }

    public function render()
    {
        return view('livewire.admin.courses.form');
    }
}
