@extends('layouts.app')
@section('STYLE')
    <style type="text/css">



    </style>
@endsection
@section('CONTENT')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <form action="{{ route("app.found") }}" class="" method="get">
                        @csrf

                        <div class="row">
                            <input type="hidden" name="searchFields" value="title;code">
                            <div class="col-sm-10">
                                <input type="search" name="search" placeholder="Pesquisar por ..." class="form-control border-input float-left"/>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="float-right btn btn-primary btn-block"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br />
            <hr />
            <br />
        </div>
        <div class="container">
            <div class="row">
                @empty($list)
                    <p class="text-center">
                    <h1>Nenhuma Oferta Corresponde a sua Pesquisa</h1>
                    </p>
                @else
                    @foreach($list as $key=>$item)
                        @component('components.card',['key'=>$key, 'item'=>$item])
                        @endcomponent
                    @endforeach
                @endempty
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">
                        <a href="https://www.magazinevoce.com.br/magazinedopaulovitor" target="_blank" class="btn btn-primary my-2" style="background: #d6bf50;border-color:#d6bf50; ">Visite Minha Loja</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-justify" style="font-size:0.6em;">Todos os produtos anunciados no Rei das Vendas são novos e entregues na casa do cliente pelos correios ou transportadora, após o pagamento; As formas de pagamento é a vista com boleto ou parcelado no cartão de crédito; Todos os produtos tem garantia de satisfação… Se ao receber não gostar, o cliente tem 7 dias para devolver, nas mesmas condições que recebeu, trocando por outro ou recebendo seu dinheiro de volta; O pagamento é feito por meio de Boleto à Vista ou Cartão de Crédito (Parcelado ou não) , o pagamento sempre é adiantado; Todas as vendas só terão nosso suporte se acontecerem nos links que fornecemos;Todos os produtos tem um prazo máximo para entrega contado em dias úteis, após o pagamento, que é informado no ato da compra mediante a informação do CEP; Todos os produtos anunciados aqui no Rei das Vendas tem valor válido para o data do anúncio ou término do estoque. Consulte sempre os valores dos mesmos na hora da compra; A montagem dos móveis/eletrônicos é por conta do cliente, bem como o encaminhamento para a assistência técnica caso o produto apresente problemas; Este site  é exclusivo e nosso cliente concorda que leu o regulamento e a ceita as condições aqui impostas;Damos garantia das entregas de todos os produtos que anunciamos;</p>
                </div>
            </div>
        </div>
    </div>


@endsection