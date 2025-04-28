@extends('layout.app')

@section("content")
{{-- linha display flexivel.  center/around/row --}}

<div class= "col-12 col-lg-2 col-xl-3 d-flex justify-content-center"> 
    {{-- bolder deixa negrito// bnt-outline faz uma hover// w- altura // m"margem" b "direcao" 4""nivel" --}}
    <a class ="btn bolder btn-outline-primary w-50 mb-4" href="{{route("users.novo")}}"> Novo </a>
</div>

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Acoes</th>            
        </tr>
    </thead>

    @foreach($users as $user)
        <tbody> 
            <tr>
                <td scopo="row">0</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telephone }}</td>
                <td clas="text-center" style="white-space: nowrap;">
                    <div style="display: inline-block">
                        <a class="btn btn-primary  text-center" href="{{route("users.edit")}}">editar</a>

                        <a class="btn btn-danger text-center">delete</a>
                    </div>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>

@endsection



