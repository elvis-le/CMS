let imgContribution = document.querySelector('.image-contribution');
let fileContribution = document.querySelector('#file-contribution');

fileContribution.addEventListener("change", () =>{
    imgContribution.src = URL.createObjectURL(fileContribution.files[0]);
});
