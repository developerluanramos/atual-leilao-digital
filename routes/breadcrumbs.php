<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('usuario', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Usuarios', route('usuario.index'));
});

Breadcrumbs::for('usuario.create', function ($trail) {
    $trail->parent('usuario');
    $trail->push('Novo Usuario', route('usuario.create'));
});
Breadcrumbs::for('usuario.edit', function (BreadcrumbTrail $trail, $usuario) {
    $trail->parent('usuario');
    $trail->push('Edição de Usuário', route('usuario.edit', $usuario));
});

Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

Breadcrumbs::for('fornecedor', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Fornecedores', route('fornecedor.index'));
});
Breadcrumbs::for('fornecedor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('fornecedor');
    $trail->push('Novo Fornecedor', route('fornecedor.create'));
});
Breadcrumbs::for('fornecedor.edit', function (BreadcrumbTrail $trail, $fornecedor) {
    $trail->parent('fornecedor');
    $trail->push('Edição de Fornecedor', route('fornecedor.edit', $fornecedor));
});
Breadcrumbs::for('fornecedor.show', function (BreadcrumbTrail $trail) {
    $trail->parent('fornecedor');
    $trail->push('Fornecedor', route('fornecedor.show'));
});

Breadcrumbs::for('cargo', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Cargos', route('cargo.index'));
});
Breadcrumbs::for('cargo.create', function (BreadcrumbTrail $trail) {
    $trail->parent('cargo');
    $trail->push('Novo Cargo', route('cargo.create'));
});
Breadcrumbs::for('cargo.edit', function (BreadcrumbTrail $trail, $cargo) {
    $trail->parent('cargo');
    $trail->push('Edição de Cargo', route('cargo.edit', $cargo));
});
Breadcrumbs::for('cargo.show', function (BreadcrumbTrail $trail) {
    $trail->parent('cargo');
    $trail->push('Cargo', route('cargo.show'));
});

Breadcrumbs::for('equipe', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Equipes', route('equipe.index'));
});

Breadcrumbs::for('equipe.create', function ($trail) {
    $trail->parent('equipe');
    $trail->push('Nova Equipe', route('equipe.create'));
});

Breadcrumbs::for('equipe.edit', function ($trail, $equipe) {
    $trail->parent('equipe');
    $trail->push('Edição de Equipe', route('equipe.edit', $equipe));
});

Breadcrumbs::for('setor', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Setores', route('setor.index'));
});
Breadcrumbs::for('setor.create', function (BreadcrumbTrail $trail) {
    $trail->parent('setor');
    $trail->push('Novo Setor', route('setor.create'));
});

Breadcrumbs::for('setor.edit', function (BreadcrumbTrail $trail, $setor) {
    $trail->parent('setor');
    $trail->push('Edição de Setor', route('setor.edit', $setor));
});

Breadcrumbs::for('posto-trabalho', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Postos Trabalho', route('posto-trabalho.index'));
});
Breadcrumbs::for('posto-trabalho.create', function (BreadcrumbTrail $trail) {
    $trail->parent('posto-trabalho');
    $trail->push('Novo Posto Trabalho', route('posto-trabalho.create'));
});
Breadcrumbs::for('posto-trabalho.edit', function (BreadcrumbTrail $trail, $cargo) {
    $trail->parent('posto-trabalho');
    $trail->push('Edição de Posto Trabalho', route('posto-trabalho.edit', $cargo));
});

Breadcrumbs::for('departamento', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard', route('dashboard.index'));
    $trail->push('Departamentos', route('departamento.index'));
});
Breadcrumbs::for('departamento.edit', function (BreadcrumbTrail $trail, $departamento) {
    $trail->parent('departamento');
    $trail->push('Edição de Departamento', route('departamento.edit', $departamento));
});

Breadcrumbs::for('leiloeiro', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard' , route('dashboard.index'));
    $trail->push('Leiloeiros', route('leiloeiro.index'));
});

Breadcrumbs::for('leiloeiro.create', function (BreadcrumbTrail $trail) {
    $trail->parent('leiloeiro');
    $trail->push('Novo Leiloeiro', route('leiloeiro.create'));
});


