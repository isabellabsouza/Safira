<div class="col-12 col-md-6 col-xxl-3">
    <div class="card rounded-0">
        @if ($produto->imagemProduto->isNotEmpty())
        <img class="card-img-top rounded-0" 
            width="100" 
            height="50%" 
            src="{{ asset('storage/' . $produto->imagemProduto->first()->caminho) }}"
            alt="">
        @else
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
                role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $produto->nome }}</h5>
            
            <p>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <a href="{{ route('produto.show', $produto->id) }}"
                class="btn btn-primary botao-lilas rounded-0 border-0">Ver mais</a>
        </div>
    </div>
</div>
