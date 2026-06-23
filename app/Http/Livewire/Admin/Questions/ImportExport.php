<?php
namespace App\Http\Livewire\Admin\Questions;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class ImportExport extends Component
{
    use WithFileUploads;

    public $importFile;

    protected $listeners = ['exportCsv'];

    public function exportCsv()
    {
        $rows = Question::all()->map(function ($q) {
            return [
                'id' => $q->id,
                'title' => $q->title,
                'body' => $q->body,
                'options' => json_encode($q->options),
                'answer' => $q->answer,
                'explanation' => $q->explanation,
                'difficulty' => $q->difficulty,
                'type' => $q->type,
            ];
        })->toArray();

        $filename = 'questions_export_'.date('Ymd_His').'.csv';
        $handle = fopen(storage_path('app/'.$filename), 'w');
        fputcsv($handle, array_keys($rows[0] ?? ['id','title','body','options','answer','explanation','difficulty','type']));
        foreach ($rows as $r) fputcsv($handle, $r);
        fclose($handle);

        return response()->download(storage_path('app/'.$filename))->deleteFileAfterSend(true);
    }

    public function updatedImportFile()
    {
        if (!$this->importFile) return;

        $this->validate([
            'importFile' => 'file|mimes:csv,txt|max:10240',
        ], [], [
            'importFile' => 'CSV file'
        ]);

        $path = $this->importFile->getRealPath();
        if (($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle);
            if (!$header) {
                session()->flash('message', 'Invalid or empty CSV file.');
                return redirect()->route('admin.questions.index');
            }
            while (($data = fgetcsv($handle)) !== false) {
                $row = @array_combine($header, $data);
                if (!$row) continue;
                Question::create([
                    'title' => $row['title'] ?? null,
                    'body' => $row['body'] ?? null,
                    'options' => isset($row['options']) ? json_decode($row['options'], true) : null,
                    'answer' => $row['answer'] ?? null,
                    'explanation' => $row['explanation'] ?? null,
                    'difficulty' => $row['difficulty'] ?? null,
                    'type' => $row['type'] ?? 'mcq',
                ]);
            }
            fclose($handle);
        }

        session()->flash('message', 'Import complete.');
        return redirect()->route('admin.questions.index');
    }

    public function render()
    {
        return view('livewire.admin.questions.import-export');
    }
}
