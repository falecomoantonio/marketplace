@extends('layouts.dashboard',['menu'=>$menu])
@section('CONTENT')

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Lista de Ofertas</h4>
                <p class="category text-left">Outras Ofertas</p>
                <p class="text-right">
                    <a href="{{ route('offers.create') }}" class="btn btn-default" style="margin-top:-50px;">Nova Oferta</a>
                </p>
            </div>
            <div class="content table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Valido Até</th>
                            <th>Disponível</th>
                            <th>Preço</th>
                            <th class="col-md-1 text-center">Ação</th>
                            <th class="col-md-1 text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @empty($list)
                        <tr>
                            <td class="text-center" colspan="6">Nenhuma Oferta Registrada</td>
                        </tr>
                    @else
                        @foreach ($list as $key => $offer)
                        <tr>
                            <td><a title="Clique para abrir a oferta" href="{{ $offer->url }}" target="_blank">{{ $offer->title }}</a></td>
                            <td>{{ $offer->available_to->format('d \\d\\e M \\d\\e Y') }}</td>
                            <td><input class="is-avaliable" type="checkbox" {{ $offer->available=='y' ? 'checked' : '' }} /></td>
                            <td>R$ {{ number_format($offer->total_price,2,',','.') }}</td>
                            <td><a role="button" href="{{ route("offers.edit",["id"=>$offer->cid]) }}" class="btn btn-block btn-warning">Editar</a></td>
                            <td><button class="btn btn-block btn-danger">Remover</button></td>
                        </tr>
                        @endforeach
                    @endempty
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-center" colspan="6">{{ $list->links() }}</td>
                        </tr>
                    </tfoot>
                </table>
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
        });
    </script>
@endsection