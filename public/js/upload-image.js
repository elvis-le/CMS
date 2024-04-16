const img = document.querySelector('.image')
const file = document.querySelector('#img-academic-year')

file.addEventListener("change", () =>{
    img.src = URL.createObjectURL(file.files[0])
})
