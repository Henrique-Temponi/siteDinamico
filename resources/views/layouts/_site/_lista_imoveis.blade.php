<div class="row section">
    <h3 align="center">Imoveis</h3>
    <div class="divider"></div>
    <br>
    @include('layouts._site._filtros')
</div>
<div class="row section">
    
    @foreach($imoveis as $imovel)
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <a href="#"><img src="{{ asset($imovel->imagem) }}" alt="Imagem"></a>
                </div>
                <div class="card-content">
                    <p><b class="deep-orange-text darken-1">{{ $imovel->status }}</b></p>
                    <p><b>{{ $imovel->titulo }}</b></p>
                    <p>{{ $imovel->descricao }}</p>
                    <p>R$ {{ $imovel->valor }}</p>
                </div>
                <div class="card-action">
                    <a href="#">Ver mais</a>
                </div>
            </div>
        </div>
    @endforeach
</div>