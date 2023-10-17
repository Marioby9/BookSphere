const $eye = document.querySelector(".eye")
const $form = document.getElementById("form")

$eye.addEventListener("click", () => {
    if($eye.className === "eye fa-solid fa-eye") {
        $eye.className = "eye fa-solid fa-eye-slash"
        $form["password"].type = "text"
    }
    else{
        $eye.className = "eye fa-solid fa-eye"
        $form["password"].type = "password"
    }
})

$form.addEventListener("submit", (event) => {
    event.preventDefault()
})

