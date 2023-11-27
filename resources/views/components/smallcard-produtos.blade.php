<div class="card col-auto mx-3" style="width: 18rem;">
    @if($produto->imagemProduto->isNotEmpty())
    <img src="{{ asset('storage/' . $produto->imagemProduto->first()->caminho) }}" 
        class="card-img-top smallcard-img" 
        alt=""
        height="200px;"
        style="object-fit:scale-down;">
    @else
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"
        role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#868e96"></rect>
        <text x="30%" y="50%" fill="#dee2e6" dy=".3em">Sem imagem &#x1F63F;</text>
    </svg>
    @endif
    <div class="card-body">
        <h5 class="card-title">{{$produto->nome}}</h5>
        <p class="card-text">{{substr($produto->descricao, 0, 85) . (strlen($produto->descricao ) > 200 ? "..." : "") }}</p>
        <a href="{{ route('produto.show', $produto->id) }}" class="stretched-link"></a>
    </div>
</div>