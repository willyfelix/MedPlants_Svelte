<link rel="stylesheet" type="text/css" href="/stylesheets/ervas.css">

<script>

  import { onMount } from "svelte";

  let erva = [];

  import { ervas, changePage } from "../assets/js/stores";
  import { ENDPOINT_LISTAR_ERVAS, ENDPOINT_DELETE_ERVA, ENDPOINT_ATUALIZAR_ERVA } from "../assets/js/endpoints";

  onMount(async () => {
    carregarErvas()
  });

  async function carregarErvas() {
    const response = await fetch( ENDPOINT_LISTAR_ERVAS , {
      credentials: "include",
    });

    if (response.ok) {
      $ervas = await response.json();
    }
  }

  async function deleteErva(id) {
    const form = new FormData();
    form.append("id_erv", id);
    const response = await fetch(ENDPOINT_DELETE_ERVA, {
      method: "POST",
      body: form,
      credentials: "include",
    });
    if (!response.ok) {
      alert("xii, algo deu errado!");
      return;
    }
    carregarErvas()
  }

  async function atualizarErva(id) {
    const form = new FormData();
    form.append("id_erv", id);
    const response = await fetch(ENDPOINT_ATUALIZAR_ERVA, {
      method: "POST",
      body: form,
      credentials: "include",
    });
    if (!response.ok) {
      alert("xii, algo deu errado!");
      return;
    }
    carregarErvas()
  }

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
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {#each $ervas as erva }
              <tr>
                <td>{erva.ID_ERV}</td>
                <td>{erva.NOME_POPULAR_ERV}</td>
                <td>{erva.NOME_CIENTIFICO}</td>
                <td>{erva.INDICACAO_USO_ERV}</td>
                <td>
                  <button class="btn btn-small btn-danger" on:click={() => deleteErva(erva.ID_ERV)}>&times;</button>
                </td>
                <td>
                  <button class="btn btn-small btn-sucess" on:click={() => atualizarErva(erva.INDICACAO_USO_ERV)}>&raquo;</button>
                </td>
              </tr>
            {/each}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>