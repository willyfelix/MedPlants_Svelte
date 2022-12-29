<link rel="stylesheet" type="text/css" href="/stylesheets/login.css"/>

<script>
    import { page, logado, changePage, usuario } from '../assets/js/stores';
    
    let email, password;

    async function logar() {
        const data = new FormData();
        data.append("email", email);
        data.append("password", password);

        const response = await fetch("http://localhost:8001/login.php", {
            method: "POST",
            body: data,
            credentials: "include",
        });
        if (!response.ok) {
            alert("Usuário ou senha incorreto");
            return;
        }
        $logado = true;
        $page = "ervas";
        $usuario = await response.json();
    }
</script>

<div class="container">
    <div class="card">
        <img id="profile-img" class="profile-img-card my-5" alt="logo" src="/images/logo.png" />

        <form class="form-signin" on:submit|preventDefault={logar}>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" class="form-control" bind:value={email} placeholder="Email" required>
            <input type="password" id="inputPassword" class="form-control" bind:value={password} placeholder="Senha" required>
            
            <button class="btn btn-success btn-block" type="submit">Entrar</button>
            <button class="btn btn-outline-info" on:click={() => changePage('register')}>Cadastrar</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

