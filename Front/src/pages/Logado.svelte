<script>
    import { currentUser,  } from '../assets/js/stores'

    let form = {
        nome: ''
    }
</script>

<h1>Aqui é a página pra quem tá logado e balão</h1>

<hr>
<form>
    <input type="text" bind:value={form.nome}>
    <input type="submit">
</form>

