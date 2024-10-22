<?php

namespace App\Providers;

use App\Models\Cargo;
use App\Models\CondicaoPagamento;
use App\Models\Departamento;
use App\Models\Equipe;
use App\Models\Especie;
use App\Models\Fornecedor;
use App\Models\Lance;
use App\Models\LanceCliente;
use App\Models\Leiloeiro;
use App\Models\Lote;
use App\Models\LoteItem;
use App\Models\Pisteiro;
use App\Models\PlanoPagamento;
use App\Models\PostoTrabalho;
use App\Models\Promotor;
use App\Models\Propriedade;
use App\Models\Raca;
use App\Models\Setor;
use App\Observers\CargoObserver;
use App\Models\User;
use App\Observers\CondicaoPagamentoObserver;
use App\Observers\DepartamentoObserver;
use App\Observers\EquipeObserver;
use App\Observers\EspecieObserver;
use App\Observers\FornecedorObserver;
use App\Observers\LanceClienteObserver;
use App\Observers\LanceObserver;
use App\Observers\LeiloeiroObserver;
use App\Observers\LoteItemObserver;
use App\Observers\LoteObserver;
use App\Observers\PisteiroObserver;
use App\Observers\PlanoPagamentoObserver;
use App\Observers\PostoTrabalhoObserver;
use App\Observers\PromotorObserver;
use App\Observers\PropriedadeObserver;
use App\Observers\RacaObserver;
use App\Observers\SetorObserver;
use App\Observers\UsuarioObserver;
use App\Repositories\Cargo\CargoEloquentRepository;
use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Cliente\ClienteEloquentRepository;
use App\Repositories\Cliente\ClienteRepositoryInterface;
use App\Repositories\Departamento\DepartamentoEloquentRepository;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeEloquentRepository;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\Especie\EspecieEloquentRepository;
use App\Repositories\Especie\EspecieRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorEloquentRepository;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\CondicaoPagamento\CondicaoPagamentoEloquentRepository;
use App\Repositories\CondicaoPagamento\CondicaoPagamentoRepositoryInterface;
use App\Repositories\Leilao\LeilaoEloquentRepository;
use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Leiloeiro\LeiloeiroEloquentRepository;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;
use App\Repositories\Lote\LoteEloquentRepository;
use App\Repositories\Lote\LoteRepositoryInterface;
use App\Repositories\Pisteiro\PisteiroEloquentRepository;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoEloquentRepository;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoEloquentRepository;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Promotor\PromotorEloquentRepository;
use App\Repositories\Promotor\PromotorRepositoryInterface;
use App\Repositories\Raca\RacaEloquentRepository;
use App\Repositories\Raca\RacaRepositoryInterface;
use App\Repositories\Setor\SetorEloquentRepository;
use App\Repositories\Setor\SetorRepositoryInterface;
use App\Repositories\Usuario\UsuarioEloquentRepository;
use App\Repositories\Usuario\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(
            FornecedorRepositoryInterface::class, FornecedorEloquentRepository::class
        );
        $this->app->bind(
            CargoRepositoryInterface::class, CargoEloquentRepository::class
        );
        $this->app->bind(
            UsuarioRepositoryInterface::class, UsuarioEloquentRepository::class
        );
        $this->app->bind(
            EquipeRepositoryInterface::class, EquipeEloquentRepository::class
        );
        $this->app->bind(
            PostoTrabalhoRepositoryInterface::class, PostoTrabalhoEloquentRepository::class
        );
        $this->app->bind(
            SetorRepositoryInterface::class, SetorEloquentRepository::class
        );
        $this->app->bind(
            DepartamentoRepositoryInterface::class, DepartamentoEloquentRepository::class
        );
        $this->app->bind(
            LeilaoRepositoryInterface::class, LeilaoEloquentRepository::class
        );
        $this->app->bind(
            LoteRepositoryInterface::class, LoteEloquentRepository::class
        );
        $this->app->bind(
            EspecieRepositoryInterface::class, EspecieEloquentRepository::class
        );
        $this->app->bind(
            RacaRepositoryInterface::class, RacaEloquentRepository::class
        );
        $this->app->bind(
            PlanoPagamentoRepositoryInterface::class, PlanoPagamentoEloquentRepository::class
        );
        $this->app->bind(
            CondicaoPagamentoRepositoryInterface::class, CondicaoPagamentoEloquentRepository::class
        );
        $this->app->bind(
            ClienteRepositoryInterface::class, ClienteEloquentRepository::class
        );
        $this->app->bind(
            LeiloeiroRepositoryInterface::class, LeiloeiroEloquentRepository::class
        );
        $this->app->bind(
            PisteiroRepositoryInterface::class, PisteiroEloquentRepository::class
        );
        $this->app->bind(
            PromotorRepositoryInterface::class, PromotorEloquentRepository::class
        );
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cargo::observe(CargoObserver::class);
        Fornecedor::observe(FornecedorObserver::class);
        User::observe(UsuarioObserver::class);
        Equipe::observe(EquipeObserver::class);
        Setor::observe(SetorObserver::class);
        PostoTrabalho::observe(PostoTrabalhoObserver::class);
        Departamento::observe(DepartamentoObserver::class);
        Lance::observe(LanceObserver::class);
        LanceCliente::observe(LanceClienteObserver::class);
        Leiloeiro::observe(LeiloeiroObserver::class);
        Especie::observe(EspecieObserver::class);
        Raca::observe(RacaObserver::class);
        Pisteiro::observe(PisteiroObserver::class);
        Promotor::observe(PromotorObserver::class);
        PlanoPagamento::observe(PlanoPagamentoObserver::class);
        CondicaoPagamento::observe(CondicaoPagamentoObserver::class);
        Lote::observe(LoteObserver::class);
        LoteItem::observe(LoteItemObserver::class);
        Propriedade::observe(PropriedadeObserver::class);

        \DB::enableQueryLog();
        Validator::extend('validarIdadeAdmissao', function ($attribute, $value, $parameters, $validator) {
            $dataNascimento = $validator->getData()['data_nascimento'];
            $dataAdmissao = $value;

            $diffAnos = now()->parse($dataNascimento)->diffInYears(now()->parse($dataAdmissao));

            return $diffAnos >= 16;
        });

        Validator::extend('notFutureDate', function ($attribute, $value, $parameters, $validator) {
            return now()->gte(now()->parse($value));
        });

        Blade::directive('money', function (string $amount) {
            return 'R$ ' . number_format((float)$amount, 2, '.', ',');
        });
    }
}
