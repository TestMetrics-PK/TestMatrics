<?php
namespace App\Http\Livewire\Student;

use Livewire\Component;

class Dashboard extends Component
{
    public $stats = [];

    public function mount()
    {
        // Placeholder stats; replace with real queries
        $this->stats = [
            'completed_practices' => 12,
            'mock_tests_taken' => 3,
            'accuracy' => '78%'
        ];
    }

    public function startPractice()
    {
        return redirect('/practice');
    }

    public function render()
    {
        return view('livewire.student.dashboard');
    }
}
