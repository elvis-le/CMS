
      $(document).ready(function(){
        $('.menu-toggle').click(function(){
          $('.menu-toggle').toggleClass('active')
          $('.menu').toggleClass('active')
        });
      });

      $( () => {
    
        //On Scroll Functionality
        $(window).scroll( () => {
          var windowTop = $(window).scrollTop();
          windowTop > 50 ? $('header').addClass('og-hf') : $('header').removeClass('og-hf');
        });
      });

      $('.counting').each(function() {
        var $this = $(this),
        countTo = $this.attr('data-count');
  
      $({ countNum: $this.text()}).animate({
        countNum: countTo
        },

      {

      duration: 3000,
      easing:'linear',
      step: function() {
      $this.text(Math.floor(this.countNum));
    },
      complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

    });  
  
  });

  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      loop: true,
      margin: 10,
      navRewind: false,
      responsive: {
        0: {
          items: 1
        },

        440:{
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


