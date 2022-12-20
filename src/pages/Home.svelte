<link rel="stylesheet" type="text/css" href="/stylesheets/home.css">

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

<div class="container">
  <div class="card mb-2" style="max-width: 80rem;">
    <div class="principal">
      <h1> MEDPLANTS</h1>
      <hr/>
    </div>
    <div class="text-center">
      <img class="img-fluid profile-img-card" alt="logo" src="/images/MedPlants.png" />
    </div>
    <h3 class="subtitulo"> Seu site para busca de ervas medicinais </h3>
      <p id="profile-name" class="profile-name-card"></p>
    {#if !$currentUser}
    
      <div class="flex text-center">
        <button class="btn btn-primary btn-signin" on:click={() => changePage('login')}>
          Login
        </button>
        <button class="btn btn-primary btn-signin" on:click={() => changePage('register')}>
          Register
        </button>
      </div>
      
    {:else}
      <Logado />
    {/if}
  </div>
</div>