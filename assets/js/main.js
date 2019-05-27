// Landing Page
const btnSideNav = document.querySelectorAll(".sidebar-toggle");

btnSideNav.forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".side-nav").classList.toggle("active");
  });
});

const btnSideNavMenu = document.querySelectorAll(".main-content .nav-menu li a");

btnSideNavMenu.forEach(btn => {
  btn.addEventListener("click", () => {
    if (btn.parentElement.classList.contains("active")) {
      btn.parentElement.classList.remove("active");
    } else {
      document.querySelectorAll(".nav-menu .active").forEach(el => el.classList.remove("active"));
      btn.parentElement.classList.add("active");
    }
  });
});

// Admin Page
$('.admin-menu-toggle').click(function () {
  $('.admin-menu').toggle('slow');
});