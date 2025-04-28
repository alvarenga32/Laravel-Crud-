@extends('layout.app')

@section("content")


<div> 
    <h3>Novo cliente</h3>

    <form method="POST" action="{{route("api.user.create")}}">
        
        @csrf
        @method('POST')

        <label for="nome">Nome:</label>
        <input class ="form-control mb-1" type="text" id="name" name="name" ><br>
        
        <label for="email">E-mail:</label>
        <input class= "form-control bolder mb-1" type="email" id="email" name="email"><br>
        
        <label for="senha">Senha:</label>
        <input class= "form-control bolder mb-1" type="password" id="password" name="password"><br>

        <label for="telefone">telefone:</label>
        <input class=" form-control mb-1" type="telephone" id="telephone" name="password"><br>       

        <button type="submit">Finalizar</button>
    </form>
</div>      

<a class = "btn bolder  mb-4"href ="{{route("users.home")}}">Voltar</a>   

@endsection