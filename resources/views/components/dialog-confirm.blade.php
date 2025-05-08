<div class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>{{ $titulo }}</h2>
        <p>{{ $conteudo }}</p>
        <button id="confirm-button">Confirmar</button>
        <button id="cancel-button">Cancelar</button>
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

    #confirm-button, #cancel-button {
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
    }

    #confirm-button {
        background-color: rgb(15, 222, 36);
        color: white;
        border: none;
        border-radius: 5px;
    }

    #confirm-button:hover {
        background-color: #218838;
    }

    #cancel-button {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
    }

    #cancel-button:hover {
        background-color: darkred;
    }
</style>

<script>
    // Lógica do modal
    var linkid;
    const modal = document.querySelector('.modal');
    const close = document.querySelector('.close-button');
    const confirmButton = document.querySelector('#confirm-button');
    const cancelButton = document.querySelector('#cancel-button');

    close.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    cancelButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    confirmButton.addEventListener('click', () => {
        window.location.href = "{{ route('links.destroy', ':id') }}".replace(':id', linkId);
             
    });

    
    function openModal(id) {
        modal.style.display = 'flex';
        linkid = id;
    }



</script>
