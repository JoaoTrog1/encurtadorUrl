@extends('app')

@section('titulo')
Downloads
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/link.css') }}">
    <script type='text/javascript' src='//pl25015687.profitablecpmrate.com/40/7d/8a/407d8a2bfd74a281cc3442b3ab0e92ab.js'></script>
    
@endsection

@section('js')
    <script src="{{ asset('js/link.js') }}"></script>
    
@endsection

@section('conteudo')
 
 <div id="container-91a92937e80d2e51c4536a76db49f6b8"></div>
    <script async="async" data-cfasync="false" src="//pl24899502.profitablecpmrate.com/91a92937e80d2e51c4536a76db49f6b8/invoke.js"></script>
    
    <div class="conteiner">
        <h1>{{$link->description}}</h1>
        <div id="botao-container">
            
            @foreach ($link->locks as $lock)
                <button class="btn btn-primary" type="button" value="{{$lock->linkLock}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        {!! $lock->category->image !!}
                    </svg>
                    {{$lock->category->text}}
                </button>
            @endforeach
            
        </div> 
        <button id="btn-acesso" type="button" class="btn btn-secondary btn-lg" value="{{$link->link}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
            </svg>
            Acesso bloqueado
        </button>
        
        

    </div >
    <div class="paitxt">
        <div class="divtxt">
            <h3>
                Ganhar dinheiro na internet tem se tornado cada vez mais acessível, com muitas oportunidades surgindo para quem quer empreender ou trabalhar remotamente. Aqui vão algumas estratégias eficazes:
            </h3>
            <p>
                1. Freelancing: Se você possui habilidades como design, redação, tradução, programação, ou marketing, pode oferecer seus serviços em plataformas como Upwork, Fiverr, ou Workana. Freelancing permite trabalhar para clientes do mundo todo e construir um portfólio sólido.
            </p>
            <p>
                2. Afiliados e Marketing de Conteúdo: O marketing de afiliados consiste em divulgar produtos de terceiros e ganhar uma comissão por cada venda gerada. É possível criar conteúdo em blogs, redes sociais ou YouTube, e utilizar links de afiliados para promover produtos que se alinhem ao seu público.
            </p>
            <p>
                3. E-commerce e Dropshipping: Com o e-commerce e o dropshipping, você pode vender produtos sem precisar de estoque. Plataformas como Shopify e AliExpress facilitam o processo, permitindo que você foque no marketing e no atendimento ao cliente, enquanto os fornecedores cuidam da entrega.
    
    
            </p>
            <p>
                4. Criar Conteúdo no YouTube ou TikTok: Monetizar conteúdo em vídeo é uma oportunidade viável. Tanto o YouTube quanto o TikTok oferecem formas de ganhar dinheiro, seja por visualizações, parcerias ou doações dos seguidores. É importante encontrar um nicho e criar vídeos de forma consistente para construir audiência.
    
            </p>
            <p>
                5. Cursos e Infoprodutos: Se você possui conhecimento em uma área específica, pode criar e vender cursos online, ebooks, ou consultorias. Plataformas como Hotmart, Udemy e Coursera são excelentes para hospedar cursos e alcançar um público amplo.
            </p>
            <p>
                6. Investimentos Online: Existem opções como ações, criptomoedas e fundos imobiliários que permitem ganhar dinheiro com investimentos. É importante estudar e entender o mercado antes de investir, buscando estratégias seguras e diversificando os investimentos.
            </p>
            <p>
                7. Marketing de Rede e Programas de Afiliados: Algumas empresas oferecem ganhos por indicação, que é uma boa alternativa para quem tem uma rede de contatos grande. Esse modelo é popular no marketing digital e pode complementar outras fontes de renda online.
    
            </p>
            <p>
                <b>Cada estratégia tem seu público e demanda dedicação, além de uma curva de aprendizado.</b>
            </p>
        </div>
    </div>
    
@endsection

