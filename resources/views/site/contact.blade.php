@extends('site.layouts.base')
@section('title', 'Contato')
@section('main')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
               @component('site.layouts._components.form_contact', ['class' => 'borda-preta', 'reason' => $reason])
               <p>A nossa equipe analisará a sua mensagem e retornará o mais brevemente possível.</p>
               <p>Nosso tempo médio de resposta é de 48 horas.</p>
               @endcomponent
            </div>
        </div>  
    </div>
@endsection