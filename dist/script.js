// // script.js
// document.getElementById('menu-toggle').addEventListener('click', function () {
//     document.getElementById('left-sidebar').classList.toggle('-translate-x-full');
// });
// document.addEventListener("DOMContentLoaded", function() {
//     const navbarItems = document.querySelectorAll("#navbar li");
//     const breadcrumb = document.getElementById("breadcrumb");
//     const mainContent = document.getElementById("main-content");

//     navbarItems.forEach(item => {
//         item.addEventListener("click", function() {
//             const tag = this.getAttribute("data-tag");
//             updateBreadcrumb(tag);
//             updateMainContent(tag);
//         });
//     });

//     function updateBreadcrumb(tag) {
//         breadcrumb.textContent = `Home > ${tag.charAt(0).toUpperCase() + tag.slice(1)}`;
//     }

//     function updateMainContent(tag) {
//         switch (tag) {
//             case "home":
//                 break;
//             case "tags":
//                 mainContent.innerHTML = `<h1>Tags</h1><p>Here are some tags you can explore.</p>`;
//                 break;
//             case "about":
//                 mainContent.innerHTML = `<h1>About Us</h1><p>Learn more about us here.</p>`;
//                 break;
//             case "contact":
//                 mainContent.innerHTML = `<h1>Contact Us</h1><p>Get in touch with us!</p>`;
//                 break;
//             default:
//                 mainContent.innerHTML = `<h1>Welcome to the Homepage</h1><p>This is the main content area.</p>`;
//         }
//     }
// });

// script.js

document.addEventListener("DOMContentLoaded", function() {
    const navbarItems = document.querySelectorAll("#navbar li");
    const breadcrumb = document.getElementById("breadcrumb");
    const mainContent = document.getElementById("main-content");

    navbarItems.forEach(item => {
        item.addEventListener("click", function() {
            const page = this.getAttribute("data-tag");
            updateBreadcrumb(page);
            loadContent(page);
        });
    });

    function updateBreadcrumb(page) {
        const pageName = page.split('.')[0].charAt(0).toUpperCase() + page.split('.')[0].slice(1);
        breadcrumb.textContent = `Home > ${pageName}`;
    }

    function loadContent(page) {
        fetch(page)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.text();
            })
            .then(html => {
                mainContent.innerHTML = html;
                 // Change the URL without reloading the page
                 const newUrl = window.location.origin + '/' + page; // Adjust as needed
                 history.pushState({ page: page }, '', newUrl);
             
            })
            .catch(error => {
                mainContent.innerHTML = `<h1>Error Loading Content</h1><p>${error.message}</p>`;
            });
    }
});