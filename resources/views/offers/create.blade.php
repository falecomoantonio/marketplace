@extends('layouts.dashboard',['menu'=>$menu])
@section('CONTENT')

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Nova Oferta</h4>
            </div>
            <div class="content">

                <form action="{{ route('offers.store') }}" method="post">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Código da Oferta</label>
                                <input type="text" class="form-control border-input" placeholder="Código (Loja)" value="{{ old('code') }}" name="code" required autofocus />
                                @if($errors->has('code'))
                                    <p class="help-block">{{ $errors->first('code') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Título da Oferta</label>
                                <input type="text" class="form-control border-input" placeholder="Titulo da Oferta" value="{{ old('title') }}" name="title" required />
                                @if($errors->has('title'))
                                    <p class="help-block">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link da Oferta</label>
                                <input type="url" class="form-control border-input" placeholder="Link da Oferta (Loja)" value="{{ old('url') }}" name="url" required />
                                @if($errors->has('url'))
                                    <p class="help-block">{{ $errors->first('url') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Principal (Link)</label>
                                <input type="url" class="form-control border-input" placeholder="Link da Imagem" value="{{ old('image') }}" name="image" required />
                                @if($errors->has('image'))
                                    <p class="help-block">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Preço à Vista</label>
                                <input type="text" class="form-control border-input" id="preco_total" name="total_price" placeholder="Preço" value="{{ old('total_price') }}">
                                @if($errors->has('total_price'))
                                    <p class="help-block">{{ $errors->first('total_price') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Parcelas</label>
                                <input type="number" id="parcela" class="form-control border-input" name="plots" placeholder="Parcelas" value="{{ old('plots') }}">
                                @if($errors->has('plots'))
                                    <p class="help-block">{{ $errors->first('plots') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor da Parcela</label>
                                <input type="text" class="form-control border-input" id="valor_parcela" name="plots_price" placeholder="Preço Parcela" value="{{ old('plots_price') }}">
                                @if($errors->has('plots_price'))
                                    <p class="help-block">{{ $errors->first('plots_price') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Validade (Dias)</label>
                                <input type="number" class="form-control border-input" name="days" placeholder="" maxlength="7" value="{{ old('days', 2) }}" required>
                                @if($errors->has('days'))
                                    <p class="help-block">{{ $errors->first('days') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>




                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('SCRIPT')
    <script type="text/javascript">
        $(function(){
            $('.is-avaliable').checkboxpicker({
                html: true,
                offLabel: '<span class="ti-close">',
                onLabel: '<span class="ti-check">'
            });

            /**
            $('#parcela').blur(function() {
                if(!$('#preco_total').is(':empty')) { return false; }
                if(!$('#valor_parcela').is(':empty')){ return false; }

                var total = +$('#preco_total').val().replace(',','.'),
                    parcelas = +$(this).val().replace(',','.');

                if(parcelas<=0) { return false; }

                var resultado = "" + Math.round(total/parcelas);
                $('#valor_parcela').val(resultado.replace('.',','));

            });
             **/
        });
    </script>
@endsection