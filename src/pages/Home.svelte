<script>
import Logado from './Logado.svelte';
import { page, users, currentUser } from "../assets/js/stores";

function changePage(v) {
  page.update(() => v);
}

// let registeredUsers = []
// users.subscribe(v => {
//   registeredUsers = v
// })

</script>
<img id="profile-img" class="profile-img-card" alt="logo" src="/images/logo.png" />
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
