{{$slot}}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('nome'))
        <span class="erros-contato">{{ $errors->first('nome') }}</span>
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$classe}}">
    <span class="erros-contato">{{ $errors->has('telefone') ? $errors->first('telefone') : '' }}</span>
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$classe}}">
    <span class="erros-contato">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivos_contato as $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{ $motivo->motivo_contato }}</option>
        @endforeach

    </select>
    <span class="erros-contato">{{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}</span>
    <br>
    <textarea name="msg" class="{{$classe}}">{{ (old('msg') != '') ? old('msg') : 'Preencha aqui a sua mensagem' }}</textarea>
    <span class="erros-contato">{{ $errors->has('msg') ? $errors->first('msg') : '' }}</span>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
{{-- 
@if ($errors->any())
    <div>
        <pre style="position: absolute; 
                         top: 0px; 
                        left: 0px;
                       width: 100%;
                  background: #f06908;
                     padding: 20px;
                 font-weight: bold;">

            @foreach ($errors->all() as $erro)
                {{ $erro }}
            @endforeach
        </pre>
    </div>
@endif --}}

<style>
    .erros-contato {
        color: white;
        font-size: .8em;
        margin-bottom: 20px;
    }
</style>