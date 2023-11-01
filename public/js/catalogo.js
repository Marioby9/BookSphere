const $bSimpleSearch = document.getElementById("bSimpleSearch")
const $bAdvSearch = document.getElementById("bAdvSearch")
const $form = document.getElementById("form")
const $modal = document.querySelector(".modal")
const $outside = document.querySelector(".outside")


$bSimpleSearch.addEventListener("click", () => $form.submit())
$bAdvSearch.addEventListener("click", () => $modal.style.display = "block")
$outside.addEventListener("click", () => $modal.style.display = "none")