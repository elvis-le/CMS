document.addEventListener('DOMContentLoaded', function () {
    var errorMessage = document.getElementById('error-message').getAttribute('data-error');
    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: errorMessage,
        });
    }

    var notificationMessage = document.getElementById('notification-message').getAttribute('data-notification');
    if (notificationMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Notification',
            text: notificationMessage,
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const inputPassword = document.querySelector('.input-password input');
    const inputPasswordForm = document.querySelector('.input-password-form');

    inputPassword.addEventListener('focus', function() {
        inputPasswordForm.classList.add('focus');
    });

    inputPassword.addEventListener('blur', function() {
        inputPasswordForm.classList.remove('focus');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const inputPassword = document.querySelector('.input-confirm-password input');
    const inputPasswordForm = document.querySelector('.input-confirm-password-form');

    inputPassword.addEventListener('focus', function() {
        inputPasswordForm.classList.add('focus');
    });

    inputPassword.addEventListener('blur', function() {
        inputPasswordForm.classList.remove('focus');
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const inputComment = document.querySelector('#input-rep-comment');
    const inputCommentBox = document.querySelector('.commentBox');

    inputComment.addEventListener('focus', function() {
        inputCommentBox.classList.add('focus');
    });

    inputComment.addEventListener('blur', function() {
        inputCommentBox.classList.remove('focus');
    });
});


const img = document.querySelector('#preview-image')
const file = document.querySelector('#personal-img')

file.addEventListener("change", () =>{
    img.src = URL.createObjectURL(file.files[0])
})
