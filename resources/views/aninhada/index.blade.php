@extends('layout')

@section('cabecalho')
Aninhada
@endsection

@section('conteudo')
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Total de registros na consulta aninhada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ((array) $rowCount as $row)
                <tr>
                    <td>{{$rowCount}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<a href="{{ route('listar_matriculas') }}" class="btn btn-dark mt-5">Voltar</a>
@endsection