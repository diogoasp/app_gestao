 {{ $slot }}
 @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
 @endif
 <form action="{{ route('site.contact') }}" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Nome" class="{{ $class }}" value="{{old('name')}}">
    @if ($errors->has('name'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('name')}}
        </div>
    @endif
    <br>
    <input name="phone" type="text" placeholder="Telefone" class="{{ $class }}" value="{{old('phone')}}">
    @if ($errors->has('phone'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('phone')}}
        </div>
    @endif
    <br>
    <input name="email" type="email" placeholder="E-mail" class="{{ $class }}" value="{{old('email')}}">
    @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('email')}}
        </div>
    @endif
    <br>
    <select name="reason_id" class="{{ $class }}">
        <option value="" >Qual o motivo do contato?</option>
        @foreach ($reason as $key => $value)
            <option value="{{$value->id}}" {{old('reason')==$key ? 'selected' : null}}>{{$value->reason}}</option>        
        @endforeach
    </select>
    @if ($errors->has('reason_id'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('reason_id')}}
        </div>
    @endif
    <br>
    <textarea name="message" class="{{ $class }}" placeholder = "{{old('message') ? '' : 'Preencha sua mensagem...'}}">{{old('message') ? old('message') : null }}</textarea>
    @if ($errors->has('message'))
        <div class="alert alert-danger" role="alert">
            {{$errors->first('message')}}
        </div>
    @endif
    <br>
    <button type="submit" class="{{ $class }}" >ENVIAR</button>
</form>