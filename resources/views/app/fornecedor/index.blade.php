<h1>Lista de Fornecedores</h1>

{{-- IF/ELSEIF/ELSE --}}
{{--
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda nao tem fornecedores cadastrados</h3>
@endif
--}}

{{--
<p>Fornecedor {{  $fornecedores[0]['nome'] }}</p>
<p>Status {{  $fornecedores[0]['status'] }}</p>
--}}

{{-- UNLESS - Se o retorno for false --}}
{{--
@unless($fornecedores[0]['status'] == 'S')
    <p>Fornecedor inativo</p>
@endunless
--}}

{{-- ISSET: Retorna true se a variavel estiver definida --}}
{{--
@isset($fornecedores)
    <p>Fornecedor {{  $fornecedores[1]['nome'] }}</p>
    <p>Status {{  $fornecedores[1]['status'] }}</p>

    @isset($fornecedores[1]['cnpj'])
        <p>CNPJ: {{ $fornecedores[1]['cnpj'] }}</p>
    @endisset
@endisset
--}}


{{-- EMPTY: Retorna true se a variavel estiver vazia:
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
--}}
{{--
@isset($fornecedores)
    <p>Fornecedor {{  $fornecedores[0]['nome'] }}</p>
    <p>Status {{  $fornecedores[0]['status'] }}</p>

    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            vazio
        @endempty
    @endisset
@endisset
--}}

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        <p><b>Iteração atual:</b> {{ $loop->iteration }}</p>
        <p><b>Fornecedor:</b> {{ $fornecedor['nome'] }}</p>
        <p><b>Status:</b> {{ $fornecedor['status'] }}</p>
        <p><b>CNPJ:</b> {{ $fornecedor['cnpj'] ?? 'Dado nao preenchido' }}</p>
        <p><b>Telefone:</b> ({{ $fornecedor['ddd'] }}) {{ $fornecedor['telefone'] ?? '' }}</p>
        @if ($loop->first)
            <span><b>Primeira iteraçao do loop</b></span>
        @endif
        @if ($loop->last)
            <span><b>Ultima iteraçao do loop</b></span>
            <br>
        @endif
        <hr>
            <p><b>Total de registro:</b> {{ $loop->count }}</p>
    @empty
        Nao existem fornecedores cadastrados
    @endforelse
@endisset
