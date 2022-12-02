<script>
  // import svelteLogo from './assets/svelte.svg'
  // import Counter from './lib/Counter.svelte'
  import Home from './lib/Home.svelte';
  import Login from './lib/Login.svelte';
  import Register from './lib/Register.svelte';
  import { page, currentUser } from './stores';
  
  function logout() {
    $currentUser = false;
  }

</script>

<main>
  ({$currentUser})
  <h1> ({$page})</h1>
  {#if $page == 'home'}
    <Home />
  {:else if !$currentUser && $page == 'login'}
    <Login />
  {:else if !$currentUser && $page == 'register'}
    <Register />
  {/if}

  {#if $currentUser}
    <button on:click={logout}>logout</button>
  {/if}

</main>

<style>
</style>
