document.addEventListener("DOMContentLoaded", function() {
    const searchBar = document.getElementById("search-bar");
    const tableRows = document.querySelectorAll(".table-list-body");

    searchBar.addEventListener("input", function() {
        const searchText = searchBar.value.toLowerCase();

        tableRows.forEach(function(row) {
            const name = row.querySelector(".table-body").textContent.toLowerCase();
            const email = row.querySelectorAll(".table-body")[1].textContent.toLowerCase();
            const phone = row.querySelectorAll(".table-body")[2].textContent.toLowerCase();
            const years = row.querySelectorAll(".table-body")[3].textContent.toLowerCase();
            const faculty = row.querySelectorAll(".table-body")[4].textContent.toLowerCase();

            if (name.includes(searchText) || email.includes(searchText) || phone.includes(searchText) || years.includes(searchText) || faculty.includes(searchText)) {
                row.style.display = "table-row";
            } else {
                row.style.display = "none";
            }
        });
    });
});
