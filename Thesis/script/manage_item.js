var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

dropdownToggles.forEach(function(toggle) {
  toggle.addEventListener('click', function(event) {
    var dropdownMenu = this.nextElementSibling;
    if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
    } else {
      closeAllDropdowns(); // Close all other dropdowns before opening this one
      dropdownMenu.style.display = "block";
      event.stopPropagation(); // Prevent event bubbling to the document
    }
  });
});

// Close all dropdown menus
function closeAllDropdowns() {
  var dropdownMenus = document.querySelectorAll('.dropdown-menu');
  dropdownMenus.forEach(function(menu) {
    menu.style.display = "none";
  });
}

// Close dropdown menu when clicking outside of it
document.addEventListener('click', function(event) {
  var dropdownMenus = document.querySelectorAll('.dropdown-menu');
  dropdownMenus.forEach(function(menu) {
    if (!menu.contains(event.target)) {
      menu.style.display = "none";
    }
  });
});
