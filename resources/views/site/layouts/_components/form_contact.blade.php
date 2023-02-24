 {{ $slot }}
 <form action="{{ route('site.contact') }}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $class }}" value="{{old('name')}}">
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="{{ $class }}" value="{{old('phone')}}">
    <br>
    <input name="email" type="email" placeholder="E-mail" class="{{ $class }}" value="{{old('email')}}">
    <br>
    <select name="reason" class="{{ $class }}">
        <option value="" >Qual o motivo do contato?</option>
        @foreach ($reason as $key => $value)
            <option value="{{$value->id}}" {{old('reason')==$key ? 'selected' : null}}>{{$value->reason}}</option>        
        @endforeach
    </select>
    <br>
    <textarea name="message" class="{{ $class }}" placeholder = "{{old('message') ? '' : 'Preencha sua mensagem...'}}">{{old('message') ? old('message') : null }}</textarea>
    <br>
    <button type="submit" class="{{ $class }}" >ENVIAR</button>
</form>