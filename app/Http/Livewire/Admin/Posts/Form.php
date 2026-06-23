<?php
namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;
use App\Models\Post;

class Form extends Component
{
    public $postId;
    public $title;
    public $slug;
    public $body;
    public $published = false;

    public function mount($id = null)
    {
        if ($id) {
            $p = Post::find($id);
            if ($p) {
                $this->postId = $p->id;
                $this->title = $p->title;
                $this->slug = $p->slug;
                $this->body = $p->body;
                $this->published = $p->published;
            }
        }
    }

    public function save()
    {
        $data = ['title'=>$this->title,'slug'=>$this->slug,'body'=>$this->body,'published'=>$this->published];
        if ($this->postId) Post::find($this->postId)->update($data); else Post::create($data);
        session()->flash('message','Post saved.');
        return redirect()->route('admin.posts.index');
    }

    public function render()
    {
        return view('livewire.admin.posts.form');
    }
}
