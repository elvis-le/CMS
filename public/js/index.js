const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn =document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");


menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display = 'block';
})

closeBtn.addEventListener('click', ()=>{
    sideMenu.style.display = 'none';
})

themeToggler.addEventListener('click', ()=>{
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})


var tableWrap = document.querySelector('.table-user-wrap');
$(tableWrap).scroll(() => {
    var tableTop = $(tableWrap).scrollTop();
    var tableHead = document.querySelector('.table-user-list-head-wrap');
    tableTop > 10 ? tableHead.style.top = '10px' : tableHead.style.top = '0';
});



