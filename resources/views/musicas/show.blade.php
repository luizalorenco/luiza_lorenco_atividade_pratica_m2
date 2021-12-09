@extends('musicas.layout')

@section('title',__($musica->nome . ': CRUD Laravel'))

@push('css')
<style>
    table{
        font-family: Verdana,sans-serif;
        border: 1px solid #ccc;
        margin: 20px 0;
    }
table th{
    padding:10px;
    font-weight: normal;
}
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span><span class="text-info">{{$musica->nome}}</span>: (@lang('CRUD Laravel'))</span>
                        <a href="{{ url('musicas') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table class="w3-table-all notranslate" width="100%" border="1">
                        <tbody>
                        <tr>
                          <th align="left"><strong>ID:</strong></th>
                          <th align="left">{{$musica->id}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Nome do Paciente')</strong>:</th>
                            <th align="left">{{$musica->nome}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Ano')</strong>:</th>
                            <th align="left">{{$musica->ano}}</th>
                          </tr>
                          <tr>
                            <th align="left"><strong>@lang('Artista')</strong>:</th>
                            <th align="left">{{$musica->artista}}</th>
                          </tr>
                          <tr>
                            <th align="left"><strong>@lang('Adicionado')</strong>:</th>
                            <th align="left">{{$musica->created_at}}</th>
                          </tr>
                          <tr>
                              <th align="left"><strong>@lang('Atualizado')</strong>:</th>
                              <th align="left">{{$musica->updated_at}}</th>
                          </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush