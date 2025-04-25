@extends('layout.app')

@section("content")
{{-- linha display flexivel.  center/around/row --}}
<div class= "container bg-dark h-100">
    

    <div class= "col-12 col-lg-2 col-xl-3 d-flex justify-content-center"> 
        {{-- bolder deixa negrito// bnt-outline faz uma hover// w- altura // m"margem" b "direcao" 4""nivel" --}}
        <a class ="btn bolder btn-outline-primary w-50 mb-4"> Novo </a>
    </div>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Gam</th>
                <th scope="col">Referencia</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Acoes</th>            
            </tr>
        </thead>

        <tbody> 
            <tr>
                <td scopo="row">0</td>
                <td>pedro</td>
                <td>03/09</td>
                <td>R$900</td>
                <td>09/05/2002</td>
                <td clas="text-center" style="white-space: nowrap;">
                    <div style="display: inline-block">
                        <a class="btn  bg-white text-center">editar</a>

                        <a class="btn bg-white text-center">delete</a>


                    </div>
                </td>
            </tr>
        </tbody>


    </table>



