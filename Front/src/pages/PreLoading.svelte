<script>
window.onload = (event) => {
	const loader = document.querySelector(".loader");
  setTimeout(() => {
		loader.style = 'display: none';
	}, 2000);
};

</script>

<div id="loader" class="loader"></div>

<style>
.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/MedPlants.gif') 50% 50% no-repeat white ;
}
</style>