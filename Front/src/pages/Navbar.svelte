<link rel="stylesheet" type="text/css" href="/stylesheets/navbar.css">

<script>
    import { logado, changePage, usuario } from '../assets/js/stores';
    import { ENDPOINT_LOGOUT } from '../assets/js/endpoints';

    async function logout() {
        const response = await fetch(ENDPOINT_LOGOUT, {
            credentials: "include",
        });

        if (response.ok) {
            $logado = false;
        }
    }
</script>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/images/MedPlants.png" id="logo" width="50" height="50" alt="logo da medplants">
            <span id="subtitulo">Olá, {$usuario?.NOME_USER || "Usuário"}</span>
        </a>
    
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <button class="btn btn-info" on:click={() => changePage('ervas')}>Ervas</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" on:click={logout}>
                        <button class="btn btn-outline-secondary">Logout</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>