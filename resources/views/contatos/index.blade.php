@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Contatos</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('contatos.create') }}">Adicionar Contato</a>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th width="280px">Ação</th>
            </tr>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->telefone }}</td>
                    <td>
                        <form action="{{ route('contatos.destroy', $contato->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('contatos.edit', $contato->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
