@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario-update',['id'=> $usuario->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$usuario->name}}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" value="{{$usuario->cpf}}" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>



                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Nascimento') }}</label>

                                <div class="col-md-6">
                                    <input id="nascimento" type="date" value="{{$usuario->nascimento}}" class="form-control @error('nascimento') is-invalid @enderror" name="nascimento" value="{{ old('nascimento') }}" required autocomplete="nascimento" autofocus>

                                    @error('nascimento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text" value="{{$usuario->telefone}}" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{$usuario->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereco') }}</label>

                                <div class="col-md-6">
                                    <input id="endereco" type="text" value="{{$usuario->endereco}}" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required autocomplete="endereco" autofocus>

                                    @error('endereco')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right m-2">{{ __('Estado') }}</label>
                            <select data-token="{{ csrf_token() }}" onchange="mudarCidade(this)"  class="form-control-sm col-md-4" name="uf_id" id="uf_id">
                                <option value="">selecione</option>
                                @foreach ($listaEstados as $estado )
                                <option value="{{$estado->CodigoUf}}">{{$estado->Nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right m-2">{{ __('Municipio') }}</label>
                                <select class="form-control-sm col-md-4" name="cidade" id="cidade_id">
                                    <option value="">selecione</option>
                                </select>
                        </div>




                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary m-3">
                                    {{ __('Atualizar') }}
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-danger" >Voltar</a>
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function mudarCidade(response) {
        console.log("{{route('buscar-cidade')}}");
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
            $.ajax({
                type:'POST',
                url:"{{route('buscar-cidade')}}",
                dataType: 'JSON',
                data: {
                    state_id: response.value
                },
                success:function(res){
                    // Caso ocorra sucesso, como faço para pegar o valor
                    // que foi retornado pelo controller?
                    $("#cidade_id").empty();
                $.each( res, function(a, b) {
                    $('#cidade_id').append($('<option>', {value: b['id'], text: b['nome']}));
                });
                },
                error:function(){
                  alert('Erro');
                },
            });
    }
    </script>
@endsection
