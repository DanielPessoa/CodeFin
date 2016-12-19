@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Listagem de Bancos</h4>
            <a href="{{route('admin.banks.create')}}" class="btn waves-effect">Novo Banco</a>
            <table class="bordered centered highlight responsive-table z-depth-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banks as $bank )
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name }}</td>
                        <td>
                            <a href="{{  route('admin.banks.edit', ['bank' => $bank->id]) }}">Editar</a> |
                            <a href="{{  route('admin.banks.destroy', ['bank' => $bank->id]) }}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $banks->links() !!}
        </div>
    </div>
@endsection