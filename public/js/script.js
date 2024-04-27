$(document).ready(function () {
    $('.menu-toggle').click(function () {
        $('.menu-toggle').toggleClass('active')
        $('.menu').toggleClass('active')
    });
});

$(() => {

    //On Scroll Functionality
    $(window).scroll(() => {
        var windowTop = $(window).scrollTop();
        windowTop > 50 ? $('header').addClass('og-hf') : $('header').removeClass('og-hf');
    });
});

$('.counting').each(function () {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({countNum: $this.text()}).animate({
            countNum: countTo
        },

        {

            duration: 3000,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
                //alert('finished');
            }

        });

});

$(document).ready(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        navRewind: false,
        responsive: {
            0: {
                items: 1
            },

            440: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
})
$(document).ready(function () {
    $('.add-contribution').click(function () {
        $('.list-contribution').toggleClass("open-list");
    });
});

$(document).ready(function () {
    $('.add-contribution-file').click(function () {
        $('.list-function-file').toggleClass("open-list");
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const btns = document.querySelectorAll(".function-btn");

    btns.forEach(btn => {
        btn.addEventListener("click", function () {
            const list = this.nextElementSibling;
            list.style.display = (list.style.display === "block") ? "none" : "block";
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const fileLinks = document.querySelectorAll('.file-link');
    const iframe = document.getElementById('file-iframe');
    const fileContainer = document.querySelector('.file-contribution-wrapper');

    fileLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const src = this.getAttribute('data-src');
            if (src.endsWith('.jpg') || src.endsWith('.jpeg') || src.endsWith('.png') || src.endsWith('.gif')) {
                fileContainer.innerHTML = '';
                var imgElement = document.createElement('img');
                imgElement.id = 'image-contribution-click';
                imgElement.src = src;
                fileContainer.appendChild(imgElement);
            } else if (src.endsWith('.docx') || src.endsWith('.doc')) {
                fileContainer.innerHTML = '';
                var iframeElement = document.createElement('iframe');
                iframeElement.id = 'iframe-contribution-click';
                iframeElement.allowfullscreen = false;
                iframeElement.src = "https://view.officeapps.live.com/op/embed.aspx?src=" + src;
                fileContainer.appendChild(iframeElement);
            } else {
                fileContainer.innerHTML = '';
                var iframeElement = document.createElement('iframe');
                iframeElement.id = 'iframe-contribution-click';
                iframeElement.allowfullscreen = false;
                iframeElement.src = src;
                fileContainer.appendChild(iframeElement);
            }
        });
    });
});

document.addEventListener('contextmenu', function (event) {
    if (event.target.id === 'image-contribution-click') {
        event.preventDefault();
    }
});

document.addEventListener('contextmenu', function (event) {
    if (event.target.id === 'iframe-contribution-click') {
        event.preventDefault();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("approved-btn").addEventListener("click", function () {
        var route = this.getAttribute("data-route");
        document.getElementById("contribution-form").action = route;
        document.getElementById("contribution-form").submit();
    });

    document.getElementById("rejected-btn").addEventListener("click", function () {
        var route = this.getAttribute("data-route");
        document.getElementById("contribution-form").action = route;
        document.getElementById("contribution-form").submit();
    });

});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("cancel-btn").addEventListener("click", function () {
        var route = this.getAttribute("data-route");
        document.getElementById("contribution-form").action = route;
        document.getElementById("contribution-form").submit();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("allow-btn").addEventListener("click", function () {
        var route = this.getAttribute("data-route");
        document.getElementById("contribution-form").action = route;
        document.getElementById("contribution-form").submit();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("un-allow-btn").addEventListener("click", function () {
        var route = this.getAttribute("data-route");
        document.getElementById("contribution-form").action = route;
        document.getElementById("contribution-form").submit();
    });
});


$(document).ready(function () {
    $('.word-contribution').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="file-upload-wrap" id="docx-contribution"></div>')
        var inputElement = $('<input accept=".docx,.doc" class="file-upload" type="file" name="file[]" multiple>');
        var spanElement = $('<span class="file-name"></span>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/microsoft-word-logo.png"></span>');
        var buttonElement = $('<button class="delete-contribution">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
            '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                divElement.insertBefore($('.add-contribution'));
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $('.img-contribution').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="file-upload-wrap"></div>')
        var inputElement = $('<input accept=".jpg,.jpeg,.png,.gif" class="file-upload" type="file" name="file[{{ $loop->index }}]" multiple>');
        var spanElement = $('<span class="file-name"></span>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/free-image-1851231-1569136.webp"></span>');
        var buttonElement = $('<button class="delete-contribution">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
            '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                divElement.insertBefore($('.add-contribution'));
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $('.pdf-contribution').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="file-upload-wrap" id="pdf-contribution"></div>')
        var inputElement = $('<input accept=".pdf" class="file-upload" type="file" name="file[]" multiple>');
        var spanElement = $('<span class="file-name"></span>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/unnamed.png"></span>');
        var buttonElement = $('<button class="delete-contribution">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
            '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                divElement.insertBefore($('.add-contribution'));
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $(document).on('click', '.delete-contribution', function () {
        $(this).closest('.file-upload-wrap').remove();
    });
});

$(document).ready(function () {
    $('.word-contribution-file').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="edit-body-contribution"></div>')
        var inputElement = $('<input accept=".docx,.doc" class="file-upload" type="file" name="file[]" multiple>');
        var spanElement = $('<a class="file-name"></a>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/microsoft-word-logo.png"></span>');
        var
            buttonElement = $('<button type="button" class="delete-contribution">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
                '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                $(".edit-body").append(divElement);
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $('.img-contribution-file').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="edit-body-contribution"></div>')
        var inputElement = $('<input accept=".jpg,.jpeg,.png,.gif" class="file-upload" type="file" name="file[]" multiple>');
        var spanElement = $('<a class="file-name"></a>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/free-image-1851231-1569136.webp"></span>');
        var buttonElement = $('<button class="delete-contribution">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
            '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                $(".edit-body").append(divElement);
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $('.pdf-contribution-file').click(function () {
        var fileType = $(this).data('type');
        var divElement = $('<div class="edit-body-contribution"></div>');
        var inputElement = $('<input accept=".pdf" class="file-upload" type="file" name="file[]" multiple>');
        var spanElement = $('<a class="file-name"></a>');
        var iconElement = $('<span class="file-icon"><img src="https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/unnamed.png"></span>');
        var buttonElement = $('<button class="delete-contribution">' +
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>' +
            '</button>');
        inputElement.change(function (e) {
            const [file] = e.target.files;
            if (file) {
                spanElement.text(file.name);
                $(".edit-body").append(divElement);
                divElement.append(spanElement);
                iconElement.insertBefore(spanElement);
                inputElement.insertAfter(spanElement);
                buttonElement.insertAfter(spanElement);
            }
        });

        inputElement.trigger('click');
    });

    $(document).on('click', '.delete-edit-body-contribution', function () {
        $(this).closest('.edit-body-contribution').remove();
    });
});


document.getElementById('edit-btn').addEventListener('click', function () {

    document.getElementById('editContribution').style.display = 'block';
});
document.getElementById('close-edit-contribution').addEventListener('click', function () {

    document.getElementById('editContribution').style.display = 'none';
});

document.getElementById('cancel-edit-contribution').addEventListener('click', function () {

    document.getElementById('editContribution').style.display = 'none';
});


document.addEventListener("DOMContentLoaded", function () {
    // Function to handle publishing all contributions
    document.querySelector(".publish-all-btn").addEventListener("click", function () {
        publishAllContributions();
    });

    // Function to handle rejecting all contributions
    document.querySelector(".reject-all-btn").addEventListener("click", function () {
        rejectAllContributions();
    });

    function publishAllContributions() {
        console.log("All contributions published.");
    }

    // Sample function to reject all contributions (replace with your logic)
    function rejectAllContributions() {
        console.log("All contributions rejected.");
    }
});

//toggleDetail for detail contributions
function toggleDetail(button) {
    var detailDiv = button.nextElementSibling;
    detailDiv.classList.toggle('show');
}


// Function to update the date display
function updateDate() {
    // Create a new Date object
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var formattedDate = year + "-" + (month < 10 ? "0" + month : month) + "-" + (day < 10 ? "0" + day : day);
    // Update the date display in the HTML element with id="currentDate"
    document.getElementById("currentDate").textContent = formattedDate;
}





updateDate();
setInterval(updateDate, 86400000);


