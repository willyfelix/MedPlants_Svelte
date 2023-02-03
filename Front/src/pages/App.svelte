<script>

  import { onMount } from "svelte";
  
  import { page, logado, usuario } from "../assets/js/stores";
  import { ENDPOINT_LOGADO } from "../assets/js/endpoints";
  
  import Login from "./Login.svelte";
  import Register from "./Register.svelte";
  import Navbar from "./Navbar.svelte";
  import Ervas from "./Ervas.svelte";  
  import CadastrarErva from "./CadastrarErva.svelte";
  import AtualizarErva from "./AtualizarErva.svelte";
  import PreLoading from "./PreLoading.svelte";
  import RecuperarSenha from "./RecuperarSenha.svelte";


  onMount(async () => {
    const response = await fetch(ENDPOINT_LOGADO, {
      credentials: "include",
    });

    if (response.ok) {
      $logado = true;
      $usuario = await response.json();
      console.log($usuario)
    }
  });
</script>

<link rel="stylesheet" type="text/css" href="/stylesheets/app.css" />

<main id="principal">

  {#if $logado === true}
    <Navbar />
  {/if}

  <PreLoading />

  {#if $page === "login"}
    <Login />
  {:else if $page === "recuperar-senha"}
    <RecuperarSenha />
  {:else if $page === "register"}
    <Register />
  {:else if $page === "ervas"}
    <Ervas />
  {:else if $page === "cadastrar-erva"}
    <CadastrarErva />
  {:else if $page === "atualizar-erva"}
    <AtualizarErva />
  {/if}
</main>
