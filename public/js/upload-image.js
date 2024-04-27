document.addEventListener("DOMContentLoaded", function () {
    function handleAcademicYearImage() {
        let imgAcademicYear = document.querySelector('.image');
        let fileAcademicYear = document.querySelector('#img-academic-year');

        fileAcademicYear.addEventListener("change", () =>{
            imgAcademicYear.src = URL.createObjectURL(fileAcademicYear.files[0]);
        });
    }

    function handleContributionImage() {
        let imgContribution = document.querySelector('.image-contribution');
        let fileContribution = document.querySelector('#file-contribution');

        fileContribution.addEventListener("change", () =>{
            imgContribution.src = URL.createObjectURL(fileContribution.files[0]);
        });
    }

    // Gọi hai hàm xử lý hình ảnh
    handleAcademicYearImage();
    handleContributionImage();
});






