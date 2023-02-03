<link rel="stylesheet" type="text/css" href="/stylesheets/recuperarSenha.css"/>

<script>
    import { page, changePage } from "../assets/js/stores";
    import { ENDPOINT_RECUPERAR_SENHA } from "../assets/js/endpoints";

    let email;
    let perguntaSecreta;
    let respostaSecreta;
    let password;
    let confirmPassword;
    let placeholder = 'Pegunta Secreta:';
	let questions = [
		{ id: 1, text: `Qual o nome da sua primeira escola?` },
		{ id: 2, text: `Qual o primeiro nome da sua mãe?` },
		{ id: 3, text: `Qual nome do seu animal?` }
	];
    
    async function recuperarSenha() {
        const data = new FormData();
        data.append("respostaSecreta", respostaSecreta);
        data.append("perguntaSecreta", perguntaSecreta);
        data.append("email", email);
        data.append("password", password);
        data.append("confirmPassword", confirmPassword);


        const response = await fetch(ENDPOINT_RECUPERAR_SENHA, {
            method: "POST",
            body: data,
            credentials: "include",
        });
        console.log(response)
        if (!response.ok) {
            alert("Algo está errado, revise seus dados ou tente novamente mais tarde!");
            return;
        }
        alert("Senha alterada com Sucesso!")
        $page = "login";
    }
</script>

<div class="container">
    <div class="card">
        <img id="profile-img" class="profile-img-card" alt="logo" src="/images/logo.png" />

        <div class="my-5 text-center">
            <h2>Alterar Senha</h2>
        </div>
        
        <form class="form-signin" on:submit|preventDefault={recuperarSenha}>

            <div class="descricao mb-2">Informe o email cadastrado:</div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <input type="text" id="inputResposta" class="item form-control" bind:value={email} placeholder="email" required>
                </div>
            </div>

            <div class=" descricao mb-2 mt-4">Confirme a pergunta secreta:</div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <select id="inputPergunta" class="form-control" bind:value={perguntaSecreta}>            
                        {#if placeholder}
                            <option value="" disabled selected>{placeholder}</option>
                        {/if}

                        {#each questions as question}
                            <option value={question.text}>
                                {question.text}
                            </option>
                        {/each}
                    </select>
                </div>
            </div>
            
            
            <div class="descricao mb-2 mt-4">Informe a resposta cadastrada:</div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <input type="text" id="inputResposta" class="item form-control" bind:value={respostaSecreta} placeholder="Resposta Secreta" required>
                </div>
            </div>


            <div class="descricao mb-2 mt-4">Digite sua nova senha:</div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <input type="password" id="inputPassword" class="grow1 item form-control" bind:value={password} placeholder="Senha" required>
                </div>

                <div class="col-sm-6">
                    <input type="password" id="inputPassword2" class="grow1 item form-control" bind:value={confirmPassword} placeholder="Confirme sua nova senha" required>
                </div>
            </div>

            <div class="row mb-2">
                {#if password != '' && password != confirmPassword}
                    <div class="col-sm-12 mb-2">
                        <!--- funcaoalerta  -->
                    </div>
                {/if}
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-success btn-block mt-2" type="submit">Cadastrar nova senha</button>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-secondary btn-block mt-2" on:click={() => changePage('login')}>Voltar</button>
                </div>
            </div>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->