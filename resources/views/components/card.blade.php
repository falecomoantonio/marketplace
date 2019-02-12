<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Rei das Vendas" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ $item->image }}" data-holder-rendered="false">
        <div class="card-body">
            <p class="card-text">{{ $item->title }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-group">
                    <p class="text-center">
                        <a href="https://web.whatsapp.com/send?phone=558899272210&text=Oi,%20eu%20quero%20informações%20sobre%20o%20produto%20*{{ $item->code }}*, por favor" target="_blank" class="btn btn-block desktop float-left btn-outline-success" title="Consulte frete e formas de pagamento"><i class="fab fa-whatsapp"></i> R$ {{ number_format($item->total_price,2,',','.') }} </a>
                        <a href="https://api.whatsapp.com/send?phone=558899272210&text=Oi,%20eu%20quero%20informações%20sobre%20o%20produto%20*{{ $item->code }}*, por favor" target="_blank" class="btn btn-block mobile float-left btn-outline-success" title="Consulte frete e formas de pagamento"><i class="fab fa-whatsapp"></i> R$ {{ number_format($item->total_price,2,',','.') }} </a>
                        <small><i class="fas fa-credit-card"></i> {{ $item->plots }} x R$ {{ number_format($item->plots_price,2,',','.') }}  (No Cartão de Crédito)</small>
                    </p>
                    <p class="text-center">
                        <small>Valido Até: {{ $item->available_to->formatLocalized('%d de %b de %Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>