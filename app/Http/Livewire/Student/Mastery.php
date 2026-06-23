<?php
namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Mastery;
use Illuminate\Support\Facades\Auth;

class Mastery extends Component
{
    public $masteries = [];

    public function mount()
    {
        $this->masteries = Mastery::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.student.mastery');
    }
}
