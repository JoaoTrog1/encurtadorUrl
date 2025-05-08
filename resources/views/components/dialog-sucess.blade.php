<div class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>{{ $titulo }}</h2>
        <p>{{ $conteudo }}</p>
        <a target="_blank" href="{{ 'https://' . parse_url(URL::full(), PHP_URL_HOST) . '/' .  $link  }}">{{ $link }}</a>                
        <button id="confirm-button">Fechar</button>
    </div>
</div>


<style>
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    .close-button {
        cursor: pointer;
        font-size: 24px;
        position: absolute;
        right: 15px;
        top: 15px;
    }

    #confirm-button {
        padding: 10px 20px;
        background-color: rgb(15, 222, 36);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #confirm-button:hover {
        background-color: #218838;
    }

    a{
        margin-bottom: 10px;
        color: rgb(15, 222, 36);
    }

</style>

<script>
    const modal = document.querySelector('.modal');
    const close = document.querySelector('.close-button');
    const confirmButton = document.querySelector('#confirm-button');

    close.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    confirmButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.onload = () => {
        modal.style.display = 'flex';
    };
</script>