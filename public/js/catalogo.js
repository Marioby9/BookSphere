const $bSimpleSearch = document.getElementById("bSimpleSearch")
const $bAdvSearch = document.getElementById("bAdvSearch")
const $simpleForm = document.getElementById("simpleForm")
const $modal = document.querySelector(".modal")
const $outside = document.querySelector(".outside")


$bSimpleSearch.addEventListener("click", () => $simpleForm.submit())
$bAdvSearch.addEventListener("click", () => $modal.style.display = "block")
$outside.addEventListener("click", () => $modal.style.display = "none")