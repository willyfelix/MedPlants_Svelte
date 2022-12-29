<link rel="stylesheet" type="text/css" href="/stylesheets/home.css">

<script>
import Logado from './Logado.svelte';
import { page, logado } from "../assets/js/stores";
function changePage(v) {
  page.update(() => v);
}
</script>

<div class="container">
  <div class="card mb-2">
    <div class="text-center">
      <img class="img-fluid profile-img-card" alt="logo" src="/images/logo.png" />
    </div>

    <h3 class="subtitulo">Seu site para busca de ervas medicinais </h3>
    
    {#if !$logado}
      <div class="row text-center mt-5">
        <div class="col-sm-12">
          <button class="btn btn-lg btn-primary width" on:click={() => changePage('login')}>
            Login
          </button>
          <button class="btn btn-lg btn-success width" on:click={() => changePage('register')}>
            Register
          </button>
        </div>
      </div>
    {:else}
      <Logado />
    {/if}
  </div>
</div>