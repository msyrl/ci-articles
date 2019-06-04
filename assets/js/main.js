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

$('textarea').each(function () {
  ClassicEditor
    .create(this, {
      toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
      heading: {
        options: [
          { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
          { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
          { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
        ]
      }
    })
    .catch(error => {
      console.log(error);
    });
});

// Admin Page
$('.admin-menu-toggle').click(function () {
  $('.admin-menu').toggle('slow');
});