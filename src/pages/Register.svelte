<link rel="stylesheet" type="text/css" href="/src/assets/stylesheets/register.css">

<script>
import { page, users } from "../assets/js/stores";
let nome
let sobrenome
let datanasc
let cpf
let email
let password
let perguntasec
let respostasec

function changePage(v) {
    page.update(() => v);
}

function registrar() {
    users.update(users => users.concat({
        nome,
        sobrenome,
        datanasc,
        cpf,
        email,
        password,
        perguntasec,
        respostasec
    }))
    changePage('home');
}
</script>

<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" alt="logo" src="/src/assets/images/logo.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" on:submit|preventDefault={registrar}>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputNome" pattern="([a-zA-Z]+)" class="form-control" bind:value={nome} placeholder="Nome" required autofocus>
            <input type="text" id="inputSobrenome" class="form-control" bind:value={sobrenome} placeholder="Sobrenome" required>
            <input type="date" id="inputDataNasc" class="form-control mb-2" bind:value={datanasc} placeholder="Data de Nascimento" required>
            <input type="text" id="inputCPF" name="cpf" class="form-control" bind:value={cpf} placeholder="CPF"required>
            <input type="text" id="inputEmail" class="form-control" bind:value={email} placeholder="exemplo@exemplo.com" required autofocus>
            <input type="password" id="inputPassword" class="form-control" bind:value={password} placeholder="Senha" required>
            <div id="remember" class="checkbox">
                
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin btn-sucess mt-3" type="submit">Cadastrar</button>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->



<button on:click={() => changePage('home')}>Voltar</button>


