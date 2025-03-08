<?php

namespace App\Livewire\Components\Inputs;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MultiFileUploadComponent extends Component
{
    use WithFileUploads;

    public $files = [];
    public $modelType; // Ex: 'Leilao' ou 'Cliente'
    public $modelUuid;   // ID do model
    public $uploadedFiles = []; // Arquivos já enviados

    protected $rules = [
        'files.*' => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
    ];

    public function mount()
    {
        $this->loadUploadedFiles();
    }

    public function updatedFiles()
    {
        $this->validate(); // Valida automaticamente ao selecionar arquivos
    }

    public function uploadFiles()
    {
        // $this->validate();
        $this->validate([
            'files' => 'required|array',
            'files.*' => 'file|max:2048|mimes:jpg,png,pdf', // 2MB limite e apenas JPG, PNG, PDF
        ], [
            'files.required' => 'Você deve selecionar pelo menos um arquivo.',
            'files.*.file' => 'O arquivo deve ser válido.',
            'files.*.max' => 'O tamanho máximo do arquivo é 2MB.',
            'files.*.mimes' => 'Apenas arquivos JPG, PNG e PDF são permitidos.',
        ]);

        $modelClass = "App\\Models\\" . $this->modelType;
        if (!class_exists($modelClass)) {
            session()->flash('error', 'Model inválida.');
            return;
        }

        $model = $modelClass::where("uuid", $this->modelUuid)->first();
        if (!$model) {
            session()->flash('error', 'Registro não encontrado.');
            return;
        }

        $directory = strtolower($this->modelType) . '/' . $this->modelUuid;

        foreach ($this->files as $file) {
            $filename = time() . '_' . $file->getClientOriginalName(); // Garante nomes únicos
            $path = $file->storeAs($directory, $filename, 'public');
            
            // Salva no banco (supondo que há uma tabela relacionada para arquivos)
            \App\Models\FileUpload::create([
                'model_type' => $this->modelType,
                'model_uuid' => $this->modelUuid,
                'file_path' => $path,
            ]);
        }

        session()->flash('success', 'Arquivos enviados com sucesso!');
        $this->reset('files');
        $this->loadUploadedFiles();
    }

    public function loadUploadedFiles()
    {
        // dd($this->modelType, $this->modelUuid);
        $this->uploadedFiles = \App\Models\FileUpload::where('model_type', $this->modelType)
            ->where('model_uuid', $this->modelUuid)
            ->get();
    }

    public function deleteFile($fileId)
    {
        $file = \App\Models\FileUpload::find($fileId);
        if ($file) {
            Storage::disk('public')->delete($file->file_path);
            $file->delete();
            session()->flash('success', 'Arquivo excluído com sucesso!');
            $this->loadUploadedFiles();
        }
    }

    public function render()
    {
        return view('livewire.components.inputs.multi-file-upload-component');
    }
}
