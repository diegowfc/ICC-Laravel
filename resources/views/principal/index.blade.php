@extends('layout')

@section('cabecalho')
Página inicial
@endsection

@section('conteudo')

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            @foreach ((array) $matriculasCount as $matriculas)
            <tr>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class="d-grid gap-2 d-md-block">
    <a href="{{ route('join_tables') }}" class="btn btn btn-secondary mt-4 mb-3 float-right">Having - C</a>
    <a href="{{ route('having') }}" class="btn btn btn-secondary mt-4 mb-3 mr-3 float-right">Having - P</a>
    <a href="{{ route('union') }}" class="btn btn btn-secondary mt-4 mb-3 mr-3 float-left">Union</a>
    <a href="{{ route('aninhada') }}" class="btn btn btn-secondary mt-4 mb-3 mr-3 float-right">Aninhada</a>
    <a href="{{ route('NotExist') }}" class="btn btn btn-secondary mt-4 mb-3 mr-3 float-right">NotExists</a>
    <a href="{{ route('Exists') }}" class="btn btn btn-secondary mt-4 mb-3 mr-3 float-right">Exists</a>
</div>
@endsection