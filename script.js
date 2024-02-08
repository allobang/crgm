// for main.php
function toggleMenu() {
  const menu = document.querySelector('.menu');
  menu.classList.toggle('active');
}

const menuItems = document.querySelectorAll('.has-submenu');

menuItems.forEach((item) => {
  item.addEventListener('click', () => {
    item.classList.toggle('active');
  });
});



// JavaScript for toggling the submenu
function toggleMenu() {
  $('.menu').toggleClass('active');
}

 // JavaScript for toggling the submenu
 $(document).ready(function() {
  $('.has-submenu > a').click(function(e) {
    e.preventDefault();
    var submenu = $(this).siblings('.submenu');
    if (submenu.length) {
      submenu.slideToggle();
      $(this).parent().toggleClass('active');
    }
  });
});

    // JavaScript for toggling the submenu
    $(document).ready(function() {
      $('.has-has-submenu > a').click(function(e) {
        e.preventDefault();
        var submenu = $(this).siblings('.submenu');
        if (submenu.length) {
          submenu.slideToggle();
        }
      });
    });


    function addColumnInput() {
      var inputContainer = document.getElementById("column_inputs");
      var newInput = document.createElement("input");
      newInput.type = "text";
      newInput.name = "column_names[]";
      newInput.placeholder = "Column Name";
      inputContainer.appendChild(newInput);
    }
