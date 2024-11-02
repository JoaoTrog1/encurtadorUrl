@extends("app")
@section('titulo')
Painel
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/create-link.css') }}">
@endsection
@section('btn')
<a href="{{ route('painel.logout') }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
    </svg>
</a>
@endsection

@section("conteudo")
    <div class="conteiner">
        <form class="row g-3" id="mainForm" action="{{ route('links.store') }}" method="POST">
            @csrf

           
            <h4>Criar Link</h4>
            <div class="col-12">
                <input type="text" class="form-control" id="inputAddress" placeholder="descrição" value="SIGA OS PASSOS" name="description">
            </div>
    
            <div class="col-12">
                <input type="text" class="form-control" id="inputAddress" placeholder="url" name="link">
            </div>
            
            <div class="col-12 title-blocks">
                <p>Links</p>
                <button type="button" class="btn" onclick="addForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </button>
            </div>
            
            <div class="dynamicFields" id="dynamicFields">
                <ul>
                    
                    <li>
                        
                        <div  class="col-12">
                            <select id="inputState" class="form-select" name="categories[]">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">
                                        {{ $categoria->text }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
    
                            <input type="text" class="form-control" id="inputLink" placeholder="link" name="locks[]">
                        </div>
                        
                    </li>
                </ul>
            </div>
    
            
            
            <div class="col-12">
                <button type="submit" class="btn salvar">Cadastrar</button>
            </div>
        </form>
    </div>

    <script>
        function addForm() {
            
            const newField = document.createElement('li');

            newField.innerHTML = `
                <div class="col-12 blocks">
                    <select class="form-select" name="categories[]">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->text }}
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-danger" onclick="removeForm(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="link" name="locks[]">
                </div>
                
            `;


            document.getElementById('dynamicFields').querySelector('ul').appendChild(newField);
        }

        function removeForm(button) {

            const fieldToRemove = (button.parentElement).parentElement;
            fieldToRemove.remove();
        }
    </script>
@endsection
