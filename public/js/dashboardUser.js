const $slides = document.querySelectorAll(".slide")
const $bNext = document.querySelector(".bNext")
const $bPrev = document.querySelector(".bPrev")

let currentSlide = 0

const showSlide = (index) => {
    $slides.forEach(slide => slide.classList.remove('active'))
    $slides[index].classList.add('active')
}

const nextSlide = () => {
    currentSlide < $slides.length -1 ? currentSlide++ : currentSlide = 0
    showSlide(currentSlide)
}

const prevSlide = () => {
    currentSlide > 0 ? currentSlide-- : currentSlide = $slides.length -1
    showSlide(currentSlide)
}

$bNext.addEventListener("click", nextSlide)
$bPrev.addEventListener("click", prevSlide)
