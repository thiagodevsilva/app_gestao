{{$slot}}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$classe}}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$classe}}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$classe}}">
    <br>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivos_contato as $motivo)
            <option value="{{$motivo->id}}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : ''}}>{{ $motivo->motivo_contato }}</option>
        @endforeach

    </select>
    <br>
    <textarea name="msg" class="{{$classe}}">{{ (old('msg') != '') ? old('msg') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<div style="display: none">
    <pre style="position: absolute; top:0px; left:0px; width: 100%; background: #f06908; padding: 20px; font-weight: bold;">
        {{ print_r($errors) }}
    </pre>
</div>