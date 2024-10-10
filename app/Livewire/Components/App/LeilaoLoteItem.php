<?php

namespace App\Livewire\Components\App;

use App\Enums\GeneroLoteItemEnum;
use App\Models\LoteItem;
use Livewire\Component;
use Livewire\WithFileUploads;
use stdClass;

class LeilaoLoteItem extends Component
{
    use WithFileUploads;

    public $errorMessage = '';
    public array $itens;
    public array $formData;
    public array $imagens;

    public array $uploadedImages;

    public array $videos;

    public stdClass $video;
    public LoteItem $item;

    protected $rules = [
        'item.descricao' => 'required|string',
        'item.especie_uuid' => 'required|string',
        'item.raca_uuid' => 'required|string',
        'item.valor_estimado' => 'required|number',
        'item.genero' => 'required|number',
        'item.imagens' => 'image|max:1024',
        'item.videos' => 'required',
        'item.video_descricao' => 'required|string',
        'item.video_url' => 'required|string',
    ];

    public function mount(array $formData)
    {
        $this->itens = [];
        $this->item = new LoteItem();
        $this->item->valor_estimado = 0;
        $this->imagens = [];
        $this->uploadedImages = [];
        $this->videos = [];
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.components.app.leilao-lote-item');
    }

    public function add()
    {
        $this->errorMessage = '';
        
        if(
            is_null($this->item->descricao)
            || is_null($this->item->especie_uuid)
            || is_null($this->item->raca_uuid)
            || is_null($this->item->genero)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }
        
        $this->itens[] = [
            'descricao' => $this->item->descricao,
            'especie_uuid' => $this->item->especie_uuid,
            'raca_uuid' => $this->item->raca_uuid,
            'valor_estimado' => $this->item->valor_estimado,
            'genero' => $this->item->genero,
            'imagens' => $this->uploadedImages,
            'videos' => $this->videos
        ];

        $this->item = new LoteItem();
        $this->imagens = [];
        $this->uploadedImages = [];
        $this->videos = [];
        $this->errorMessage = '';
    }

    public function addVideo()
    {
        $this->videos[] = [
            'descricao' => $this->item->video_descricao,
            'url' => $this->item->video_url
        ];
    }

    public function updatedImagens()
    {
        $this->validate([
            'imagens.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach($this->imagens as $imgIndex => $imagem)
        {
            $this->uploadedImages[] = [
                "descricao" => $imagem->getFileName(),
                "url" => $imagem->store('imagens/lote-itens', 'local')
            ];
        }
    }
    
    function removeVideo(int $index)
    {
        array_splice($this->videos, $index, 1);
        $this->errorMessage = '';
    }

    function removeImagem(int $index)
    {
        array_splice($this->imagens, $index, 1);
        $this->errorMessage = '';
    }

    public function remove(int $index)
    {
        array_splice($this->itens, $index, 1);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }

    public function getValorTotalProperty()
    {
        return array_sum(array_column($this->itens, 'valor_estimado'));
    }

    public function getQuantidadeMachoProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::MACHO;
        }));
    }

    public function getQuantidadeFemeaProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::FEMEA;
        }));
    }

    public function getQuantidadeOutroProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::OUTRO;
        }));
    }
}
