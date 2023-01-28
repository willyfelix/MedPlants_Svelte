<link rel="stylesheet" type="text/css" href="/stylesheets/ervas.css">

<script>

  import { onMount } from "svelte";

  import { ervas, changePage, ervaAtual } from "../assets/js/stores";
  import { ENDPOINT_LISTAR_ERVAS, ENDPOINT_DELETE_ERVA} from "../assets/js/endpoints";

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

  function mudarPagina (erva) {
    $ervaAtual = erva; 
    changePage("atualizar-erva");
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
              <th>Contra indicação</th>
              <th>Propriedades</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            {#each $ervas as erva, i }
              <tr>
                <td>{i+1}</td>
                <td>{erva.NOME_POPULAR_ERV}</td>
                <td>{erva.NOME_CIENTIFICO}</td>
                <td>{erva.INDICACAO_USO_ERV}</td>
                <td>{erva.CONTRA_INDICACAO_ERV}</td>
                <td>{erva.PROPRIEDADES_ERV}</td>
                <td>
                  <button class="btn btn-small btn-danger" on:click={() => deleteErva(erva.ID_ERV)}>&times;</button>
                  <button class="btn btn-small btn-sucess" on:click={() => mudarPagina(erva)}> &#9998;
                  </button>
                </td>
                <td>
                </td>
              </tr>
            {/each}
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>