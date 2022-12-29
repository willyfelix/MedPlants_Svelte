<link rel="stylesheet" type="text/css" href="/stylesheets/ervas.css">

<script>
  import { onMount } from "svelte";
  import { ervas, changePage } from "../assets/js/stores";

  onMount(async () => {
    const response = await fetch("http://localhost:8001/listarErvas.php", {
      credentials: "include",
    });

    if (response.ok) {
      $ervas = await response.json();
    }
  });
</script>

<div class="container mt-2">
  <div class="card mb-2">
    
    <div class="row">
      <div class="col-sm-12">
        <button class="btn btn-success width" on:click={() => changePage('cadastrar-erva')}>
          Cadastrar nova erva
        </button>
      </div>
    </div>
    
    <div class="row text-center mt-5">
      <div class="col-sm-12">
        <table class="table table-hover table-striped table-light">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome popular</th>
              <th>Nome científico</th>
              <th>Indicação de uso</th>
            </tr>
          </thead>
          <tbody>
            {#each $ervas as erva }
              <tr>
                <td>{erva.ID_ERV}</td>
                <td>{erva.NOME_POPULAR_ERV}</td>
                <td>{erva.NOME_CIENTIFICO}</td>
                <td>{erva.INDICACAO_USO_ERV}</td>
              </tr>
            {/each}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>