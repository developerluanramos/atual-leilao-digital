<?php

namespace App\Providers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Equipe;
use App\Models\Fornecedor;
use App\Models\PostoTrabalho;
use App\Models\Setor;
use App\Observers\CargoObserver;
use App\Models\User;
use App\Observers\DepartamentoObserver;
use App\Observers\EquipeObserver;
use App\Observers\FornecedorObserver;
use App\Observers\PostoTrabalhoObserver;
use App\Observers\SetorObserver;
use App\Observers\UsuarioObserver;
use App\Repositories\Cargo\CargoEloquentRepository;
use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Departamento\DepartamentoEloquentRepository;
use App\Repositories\Departamento\DepartamentoRepositoryInterface;
use App\Repositories\Equipe\EquipeEloquentRepository;
use App\Repositories\Equipe\EquipeRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorEloquentRepository;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\Leilao\LeilaoEloquentRepository;
use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\PostoTrabalho\PostoTrabalhoEloquentRepository;
use App\Repositories\PostoTrabalho\PostoTrabalhoRepositoryInterface;
use App\Repositories\Setor\SetorEloquentRepository;
use App\Repositories\Setor\SetorRepositoryInterface;
use App\Repositories\Usuario\UsuarioEloquentRepository;
use App\Repositories\Usuario\UsuarioRepositoryInterface;
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

        Validator::extend('validarIdadeAdmissao', function ($attribute, $value, $parameters, $validator) {
            $dataNascimento = $validator->getData()['data_nascimento'];
            $dataAdmissao = $value;

            $diffAnos = now()->parse($dataNascimento)->diffInYears(now()->parse($dataAdmissao));

            return $diffAnos >= 16;
        });

        Validator::extend('notFutureDate', function ($attribute, $value, $parameters, $validator) {
            return now()->gte(now()->parse($value));
        });
    }
}
