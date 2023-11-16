const $bSimpleSearch = document.getElementById("bSimpleSearch")
const $bReturnBook = document.getElementById("bSimpleSearch")
const $bReloanBook = document.getElementById("bSimpleSearch")
const $simpleForm = document.getElementById("simpleForm")
const $reloanReturnForm = document.getElementById("reloanReturnForm")

$bSimpleSearch.addEventListener("click", () => $simpleForm.submit())
$bReloanBook.addEventListener("click", () => $reloanReturnForm.submit())
$bReturnBook.addEventListener("click", () => $reloanReturnForm.submit())