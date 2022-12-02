<script>
import Logado from './Logado.svelte';
import { page, users, currentUser } from "../stores";

function changePage(v) {
  page.update(() => v);
}

// let registeredUsers = []
// users.subscribe(v => {
//   registeredUsers = v
// })

</script>
<h2>Home</h2>
{#if !$currentUser}
  <button on:click={() => changePage('login')}>
    Login
  </button>
  <button on:click={() => changePage('register')}>
    Register
  </button>
{:else}
  <Logado />
{/if}
