<link rel="stylesheet" type="text/css" href="/stylesheets/register.css">

<script>
import { page, users } from "../assets/js/stores";
let nome
let sobrenome
let datanasc
let cpf
let email
let password
let password2
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
        password2,
        perguntasec,
        respostasec
    }))
    changePage('home');
}

 // Input Pergunta Secreta   
    
    let placeholder = 'Pegunta Secreta:';
	let questions = [
		{ id: 1, text: `Qual o nome da sua primeira escola?` },
		{ id: 2, text: `Qual o primeiro nome da sua mãe?` },
		{ id: 3, text: `Qual nome do seu animal?` }
	];

    let selectedValue = "";
    let answer ='';

    //Input CPF

    function funcaoalerta() {
        alert("Senhas não conferem!")
    }

</script>

<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" alt="logo" src="/images/logo.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" on:submit|preventDefault={registrar}>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputNome" pattern="([a-zA-Z]+)" class="form-control" bind:value={nome} placeholder="Nome" required autofocus>
            <input type="text" id="inputSobrenome" class="form-control" bind:value={sobrenome} placeholder="Sobrenome" required>
            <input type="date" id="inputDataNasc" class="form-control mb-2" bind:value={datanasc} placeholder="Data de Nascimento" required>
            <input type="text" id="inputCPF" name="cpf" class="form-control" bind:value={cpf} placeholder="CPF" required>
            <select id="inputPergunta" class="form-control" bind:value={selectedValue}>            
            	{#if placeholder}
                    <option value="" disabled selected>{placeholder}</option>
                {/if}
                {#each questions as question}
                    <option value={question.text}>
                        {question.text || question.text}
                    </option>
                {/each}
            </select>
            <input type="text" id="inputResposta" class="form-control mt-2" bind:value={answer} placeholder="Resposta Secreta" required>
            <input type="text" id="inputEmail" class="form-control" bind:value={email} placeholder="exemplo@exemplo.com" required autofocus>
            <input type="password" id="inputPassword" class="form-control" bind:value={password} placeholder="Senha" required>
            <input type="password" id="inputPassword2" class="form-control" bind:value={password2} placeholder="Confirme sua senha" required>
            {#if password != '' && password != password2}
                <!--- funcaoalerta  -->
            {/if}

            <div id="remember" class="checkbox">
            
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin btn-sucess mt-3" type="submit">Cadastrar</button>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->



<button on:click={() => changePage('home')}>Voltar</button>


