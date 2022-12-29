<link rel="stylesheet" type="text/css" href="/stylesheets/register.css">

<script>
import { page, users, logado } from "../assets/js/stores";
let nome
let sobrenome
let dataNascimento
let cpf
let email
let password
let password2
let perguntaSecreta
let respostaSecreta
function changePage(v) {
    page.update(() => v);
}
function registrar() {
    users.update(users => users.concat({
        nome,
        sobrenome,
        dataNascimento,
        cpf,
        email,
        password,
        password2,
        perguntaSecreta,
        respostaSecreta
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
    
    async function cadastrar() {
        const data = new FormData();
        data.append("nome", nome);
        data.append("sobrenome", sobrenome);
        data.append("dataNascimento", dataNascimento);
        data.append("cpf", cpf);
        data.append("email", email);
        data.append("preguntaSecreta", perguntaSecreta);
        data.append("respostaSecreta", respostaSecreta);
        data.append("password", password);
        data.append("password2", password2);

        const response = await fetch("http://localhost:8001/cadastrar.php", {
            method: "POST",
            body: data,
            credentials: "include",
        });
        if (!response.ok) {
            alert("Usuário ou senha incorreto");
            return;
        }
        $logado = true;
        $page = "home";
    }
    
    //ALERT
    function funcaoalerta() {
        alert("Senhas não conferem!")
    }
</script>

<div class="container">
    <div class="card">
        <img id="profile-img" class="profile-img-card" alt="logo" src="/images/logo.png" />

        <div class="my-5 text-center">
            <h2>Formulário de Registro</h2>
        </div>
        
        <form class="form-signin" on:submit|preventDefault={registrar}>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <input type="text" class="form-control" bind:value={nome} placeholder="Digite seu nome" required autofocus pattern="([a-zA-Z]+)" >
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-12">
                  <input type="text" class="form-control" bind:value={sobrenome} placeholder="Digite seu sobrenome" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <input type="date" id="inputDataNasc" class="item form-control mb-2" bind:value={dataNascimento} placeholder="Data de Nascimento" required>
                </div>

                <div class="col-sm-6">
                    <input type="text" id="inputCPF" name="cpf" class="item form-control" bind:value={cpf} placeholder="CPF" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-12">
                    <input type="text" id="inputEmail" class="item form-control" bind:value={email} placeholder="exemplo@exemplo.com" required autofocus>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-12">
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
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-12">
                    <input type="text" id="inputResposta" class="item form-control" bind:value={answer} placeholder="Resposta Secreta" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-6">
                    <input type="password" id="inputPassword" class="grow1 item form-control" bind:value={password} placeholder="Senha" required>
                </div>

                <div class="col-sm-6">
                    <input type="password" id="inputPassword2" class="grow1 item form-control" bind:value={password2} placeholder="Confirme sua senha" required>
                </div>
            </div>

            <div class="row mb-2">
                {#if password != '' && password != password2}
                    <div class="col-sm-12 mb-2">
                        <!--- funcaoalerta  -->
                    </div>
                {/if}
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success btn-block mt-2" type="submit">Cadastrar</button>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-outline-secondary btn-block mt-2" on:click={() => changePage('home')}>Voltar</button>
                </div>
            </div>

        </form><!-- /form -->

        
    </div><!-- /card-container -->
</div><!-- /container -->