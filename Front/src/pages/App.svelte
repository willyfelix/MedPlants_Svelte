<script>
  import Home from "./Home.svelte";
  import Login from "./Login.svelte";
  import Register from "./Register.svelte";
  import { page, logado } from "../assets/js/stores";
  import { onMount } from "svelte";

  onMount(async () => {  
    const response = await fetch("http://localhost:8001/logado.php", {
      credentials: "include",
    });
    if (response.ok) {
      $logado = true;
    } else {
      $logado = false;
    }
  });
  function logout() {
    $logado = false;
  }

</script>

<link rel="stylesheet" type="text/css" href="/stylesheets/app.css" />

<main id="principal">
  {#if $page == "home"}
    <Home />
  {:else if !$logado && $page == "login"}
    <Login />
  {:else if !$logado && $page == "register"}
    <Register />
  {/if}

  {#if $logado}
    <button on:click={logout}>logout</button>
  {/if}
</main>

<style>
</style>
