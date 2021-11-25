<div class="left-menu">
    <div class="content-logo">
        <img alt="platform by Emily van den Heever from the Noun Project" title="platform by Emily van den Heever from the Noun Project" src="{{ asset("ApiP/images/logo.png") }}" height="32" />
        <span>{{ $title ?? "API Global Service" }}</span>
    </div>
    <div class="content-menu">
        <ul>
            <h3 style="padding-left: 20px;">Informações Iniciais</h3>
            <li class="scroll-to-link active" data-target="get-started">
                <a>Get Started</a>
            </li>
            <hr>
            <h3 style="padding-left: 20px;">Rotas de Autenticação</h3>
            <li class="scroll-to-link" data-target="login">
                <a>Logar na API</a>
            </li>
            <li class="scroll-to-link" data-target="logout">
                <a>Deslogar na API</a>
            </li>
            <li class="scroll-to-link" data-target="refresh">
                <a>Renovar Token</a>
            </li>
            <hr>
            <h3 style="padding-left: 20px;">Produtos</h3>
            <li class="scroll-to-link" data-target="product-index">
                <a>Lista de Produtos</a>
            </li>
            <li class="scroll-to-link" data-target="product-show">
                <a>Mostrar Produtos</a>
            </li>
            <li class="scroll-to-link" data-target="product-create">
                <a>Cadastro de Produtos</a>
            </li>
            <li class="scroll-to-link" data-target="product-edit">
                <a>Edição de Produtos</a>
            </li>
            <li class="scroll-to-link" data-target="product-delete">
                <a>Exclusão de Produtos</a>
            </li>
            <hr>
            <li class="scroll-to-link" data-target="returns-errors">
                <a>Retornos de Erros</a>
            </li>
        </ul>
    </div>
</div>
