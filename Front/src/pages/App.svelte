<script>
  import Home from "./Home.svelte";
  import Login from "./Login.svelte";
  import Register from "./Register.svelte";
  import { page, currentUser } from "../assets/js/stores";
  function logout() {
    $currentUser = false;
  }
</script>

<link rel="stylesheet" type="text/css" href="/stylesheets/app.css" />

<main id="principal">
  {#if $page == "home"}
    <Home />
  {:else if !$currentUser && $page == "login"}
    <Login />
  {:else if !$currentUser && $page == "register"}
    <Register />
  {/if}

  {#if $currentUser}
    <button on:click={logout}>logout</button>
  {/if}
</main>

<style>
</style>