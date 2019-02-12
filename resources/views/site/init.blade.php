@extends('layouts.app')
@section('STYLE')
    <style type="text/css">



    </style>
@endsection
@section('CONTENT')

    <section class="text-center">
        <div class="container">
            <div class="col-md-12">
                <p style="padding-top:20px;padding-bottom: 10px;">
                    <img width="100%" src="http://www.reidasvendas.com/wp-content/uploads/2018/07/cropped-Capa-Para-Facebook-02.jpg" alt="" />
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
            @empty($list)
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="">Nenhuma Oferta Para Hoje</h1>
                    </div>
                </div>
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