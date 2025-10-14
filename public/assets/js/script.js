'use strict';

// Element toggle function
const elementToggleFunc = function (elem) { elem.classList.toggle("active"); }

// Sidebar variables
const sidebar = document.querySelector("[data-sidebar]");
const sidebarBtn = document.querySelector("[data-sidebar-btn]");

// Sidebar toggle functionality for mobile
sidebarBtn.addEventListener("click", function () { elementToggleFunc(sidebar); });

// Tab variables
const navigationLinks = document.querySelectorAll("[data-nav-link]");
const pages = document.querySelectorAll("[data-page]");

// Navigation functionality
navigationLinks.forEach(function (link) {
  link.addEventListener("click", function () {
    // Activer l'onglet cliqué et désactiver les autres
    navigationLinks.forEach(link => link.classList.remove("active"));
    this.classList.add("active");

    // Afficher la page correspondante et masquer les autres
    const target = this.innerHTML.toLowerCase().trim();
    showPage(target);

    // Mettre à jour le hash dans l'URL sans rechargement
    window.history.pushState(null, null, `#${target}`);
  });
});

// Function to show a specific page
function showPage(target) {
  pages.forEach(function (page) {
    if (page.dataset.page === target) {
      page.classList.add("active");

      // Si on ouvre la page portfolio, initialiser le filtre
      if (target === 'portfolio') {
        initFilterButtons();
      }
    } else {
      page.classList.remove("active");
    }
  });
}

// Portfolio filter variables
let filterButtons = null;
let filterableItems = null;
let filterSelectBox = null;
let filterSelectItems = null;

// Log version for debugging
console.log('Portfolio Filter v2.1 - Script loaded with data-filter-value support');

// Function to initialize filter buttons
function initFilterButtons() {
  // Only initialize if not already initialized
  if (!filterButtons) {
    filterButtons = document.querySelectorAll("[data-filter-btn]");
    filterableItems = document.querySelectorAll("[data-filter-item]");
    filterSelectBox = document.querySelector("[data-select]");
    filterSelectItems = document.querySelectorAll("[data-select-item]");

    console.log(`Found ${filterButtons.length} filter buttons and ${filterableItems.length} filterable items`);

    // Add event listeners to filter buttons
    for (let i = 0; i < filterButtons.length; i++) {
      filterButtons[i].addEventListener("click", function () {
        let filterValue = this.getAttribute('data-filter-value') || this.textContent.toLowerCase().trim();
        console.log(`Filter button clicked: "${this.textContent.trim()}", filter value: "${filterValue}"`);
        filterProjects(filterValue);

        // Mettre à jour le hash pour inclure la catégorie
        if (filterValue !== 'all') {
          window.history.pushState(null, null, `#portfolio#${filterValue}`);
        } else {
          window.history.pushState(null, null, `#portfolio`);
        }
      });
    }

    // Add event listener to filter select box
    filterSelectBox.addEventListener("click", function () { elementToggleFunc(this); });

    // Add filter functionality to select items
    for (let i = 0; i < filterSelectItems.length; i++) {
      filterSelectItems[i].addEventListener("click", function () {
        let filterValue = this.getAttribute('data-filter-value') || this.textContent.toLowerCase().trim();
        filterProjects(filterValue);

        filterSelectBox.querySelector("[data-selecct-value]").textContent = this.textContent;
        elementToggleFunc(filterSelectBox);

        // Mettre à jour le hash pour inclure la catégorie
        if (filterValue !== 'all') {
          window.history.pushState(null, null, `#portfolio#${filterValue}`);
        } else {
          window.history.pushState(null, null, `#portfolio`);
        }
      });
    }
  }
}

// Function to filter projects
function filterProjects(filterValue) {
  console.log(`filterProjects() called with value: "${filterValue}"`);
  let visibleCount = 0;

  for (let i = 0; i < filterButtons.length; i++) {
    let buttonValue = filterButtons[i].getAttribute('data-filter-value') || filterButtons[i].textContent.toLowerCase().trim();
    if (buttonValue === filterValue) {
      filterButtons[i].classList.add("active");
    } else {
      filterButtons[i].classList.remove("active");
    }
  }

  filterableItems.forEach(function (item) {
    const itemCategory = item.dataset.category;
    const shouldShow = filterValue === 'all' || itemCategory === filterValue;

    if (shouldShow) {
      item.classList.add("active");
      visibleCount++;
    } else {
      item.classList.remove("active");
    }

    console.log(`  - Item category: "${itemCategory}", should show: ${shouldShow}`);
  });

  console.log(`Total visible items: ${visibleCount}`);
}

// Testimonials variables
const testimonialsItem = document.querySelectorAll("[data-testimonials-item]");
const modalContainer = document.querySelector("[data-modal-container]");
const modalCloseBtn = document.querySelector("[data-modal-close-btn]");
const overlay = document.querySelector("[data-overlay]");

// Modal variable
const modalImg = document.querySelector("[data-modal-img]");
const modalTitle = document.querySelector("[data-modal-title]");
const modalText = document.querySelector("[data-modal-text]");

// Modal toggle function
const testimonialsModalFunc = function () {
  modalContainer.classList.toggle("active");
  overlay.classList.toggle("active");
}

// Add click event to all modal items
for (let i = 0; i < testimonialsItem.length; i++) {
  testimonialsItem[i].addEventListener("click", function () {
    modalImg.src = this.querySelector("[data-testimonials-avatar]").src;
    modalImg.alt = this.querySelector("[data-testimonials-avatar]").alt;
    modalTitle.innerHTML = this.querySelector("[data-testimonials-title]").innerHTML;
    modalText.innerHTML = this.querySelector("[data-testimonials-text]").innerHTML;
    testimonialsModalFunc();
  });
}

// Add click event to modal close button
modalCloseBtn.addEventListener("click", testimonialsModalFunc);
overlay.addEventListener("click", testimonialsModalFunc);

// Custom form validation
const form = document.querySelector("[data-form]");
const formInputs = document.querySelectorAll("[data-form-input]");
const formBtn = document.querySelector("[data-form-btn]");

// Add input event to all form input fields
for (let i = 0; i < formInputs.length; i++) {
  formInputs[i].addEventListener("input", function () {
    // Check form validation
    if (form.checkValidity()) {
      formBtn.removeAttribute("disabled");
    } else {
      formBtn.setAttribute("disabled", "");
    }
  });
}

// Handle hash in URL on page load
document.addEventListener('DOMContentLoaded', function() {
  let hash = window.location.hash;

  if (hash) {
    // Check for category in hash (format: #page#category)
    const hashParts = hash.substring(1).split('#');
    const page = hashParts[0].toLowerCase();
    const category = hashParts.length > 1 ? hashParts[1].toLowerCase() : null;

    // Find the navigation link for this page
    navigationLinks.forEach(function(link) {
      const linkText = link.innerHTML.toLowerCase().trim();
      if (linkText === page) {
        // Simulate a click on this tab
        link.click();

        // If there's also a category and we're on the portfolio page
        if (category && page === 'portfolio') {
          // Wait a moment for the portfolio to initialize
          setTimeout(function() {
            // Find the filter button for this category
            filterButtons.forEach(function(btn) {
              if (btn.textContent.toLowerCase().trim() === category) {
                btn.click();
              }
            });
          }, 100);
        }
      }
    });
  }
});

// Add metadata for social sharing
function addSocialMetaTags() {
  // Get current page title
  const pageTitle = document.title;

  // Create meta tags if they don't exist
  if (!document.querySelector('meta[property="og:title"]')) {
    const ogTitle = document.createElement('meta');
    ogTitle.setAttribute('property', 'og:title');
    ogTitle.setAttribute('content', pageTitle);
    document.head.appendChild(ogTitle);
  }

  if (!document.querySelector('meta[property="og:description"]')) {
    const ogDesc = document.createElement('meta');
    ogDesc.setAttribute('property', 'og:description');
    ogDesc.setAttribute('content', 'Portfolio professionnel de Mbassi Loic Aron - Développeur Web Full Stack');
    document.head.appendChild(ogDesc);
  }

  if (!document.querySelector('meta[property="og:image"]')) {
    const ogImage = document.createElement('meta');
    ogImage.setAttribute('property', 'og:image');
    // Utilisez une image de partage par défaut de votre site
    ogImage.setAttribute('content', window.location.origin + '/assets/images/portfolio-share.jpg');
    document.head.appendChild(ogImage);
  }

  if (!document.querySelector('meta[property="og:url"]')) {
    const ogUrl = document.createElement('meta');
    ogUrl.setAttribute('property', 'og:url');
    ogUrl.setAttribute('content', window.location.href);
    document.head.appendChild(ogUrl);
  }

  // Twitter Cards
  if (!document.querySelector('meta[name="twitter:card"]')) {
    const twitterCard = document.createElement('meta');
    twitterCard.setAttribute('name', 'twitter:card');
    twitterCard.setAttribute('content', 'summary_large_image');
    document.head.appendChild(twitterCard);
  }
}

// Initialize social sharing meta tags
addSocialMetaTags();
