<link rel="stylesheet" type="text/css" href="/stylesheets/login.css"/>

<script>
    import { page, users, currentUser } from '../assets/js/stores';

    let email, password
    function changePage(v) {
        page.update(() => v);
    }

    function logar() {
        // let user = $users.find(function(u) {
        //     return u.username == username && u.password == password;
        // })
        let user = null;
        for (let i = 0; i < $users.length; i++) {
            if ($users[i].email == email && $users[i].password == password) {
                user = $users[i];
                break;
            }
        }
        if (!user) {
            alert('usuário não encontrado')
            return
        }
        $currentUser = user
        $page = 'home'
    }
</script>

<div class="container">
    <div class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" alt="logo" src="/images/logo.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" on:submit|preventDefault={logar}>
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" class="form-control" bind:value={email}  placeholder="Email" required autofocus>
            <input type="password" id="inputPassword" class="form-control" bind:value={password} placeholder="Senha" required>
            <div id="remember" class="checkbox">
                <label>
                    <input class="checkbox" type="checkbox" value="remember-me"> Lembrar senha
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

<button on:click={() => changePage('home')}>Voltar</button>

