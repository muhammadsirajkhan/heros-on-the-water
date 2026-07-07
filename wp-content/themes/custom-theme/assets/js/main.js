document.addEventListener("DOMContentLoaded", function () {
  initMobileMenu();
  initHotwPolaroidSwiper();
  initHotwGallerySwiper();
  initHotwWhatsOnViewToggle();
  initHotwVibeYoutubeModal();
  initHotwStoryPizzaSwiper();
});

/**
 * Mobile drawer menu (matches page-template/header.php hooks).
 */
function initMobileMenu() {
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
  const mobileMenuClose = document.querySelector(".mobile-menu-close");
  const mobileNavPanel = document.querySelector(".mobile-nav-panel");
  const mobileNavOverlay = document.querySelector(".mobile-nav-overlay");

  if (
    !mobileMenuToggle ||
    !mobileNavPanel ||
    !mobileNavOverlay ||
    !mobileMenuClose
  ) {
    return;
  }

  const openMenu = () => {
    mobileNavPanel.classList.add("is-open");
    mobileNavOverlay.classList.add("is-open");
    mobileMenuToggle.setAttribute("aria-expanded", "true");
    document.body.style.overflow = "hidden";
  };

  const closeMenu = () => {
    mobileNavPanel.classList.remove("is-open");
    mobileNavOverlay.classList.remove("is-open");
    mobileMenuToggle.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";
  };

  mobileMenuToggle.addEventListener("click", openMenu);
  mobileMenuClose.addEventListener("click", closeMenu);
  mobileNavOverlay.addEventListener("click", closeMenu);

  const menuItemsWithChildren = document.querySelectorAll(
    ".mobile-navigation .menu-item-has-children > a",
  );

  menuItemsWithChildren.forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const parentLi = this.parentElement;
      const subMenu = parentLi.querySelector(".sub-menu");

      if (!subMenu) {
        return;
      }

      if (parentLi.classList.contains("open")) {
        parentLi.classList.remove("open");
        subMenu.classList.remove("is-open");
      } else {
        parentLi.classList.add("open");
        subMenu.classList.add("is-open");
      }
    });
  });
}

/**
 * Polaroid strip: Swiper only on small viewports.
 */
function initHotwPolaroidSwiper() {
  const root = document.querySelector(".hotw-polaroid-swiper-root");
  if (!root || typeof Swiper === "undefined") {
    return;
  }

  let swiper = null;
  const mq = window.matchMedia("(max-width: 991.98px)");

  const apply = () => {
    if (mq.matches) {
      if (!swiper) {
        swiper = new Swiper(root, {
          slidesPerView: 1.12,
          spaceBetween: 16,
          centeredSlides: true,
          pagination: {
            el: root.querySelector(".swiper-pagination"),
            clickable: true,
          },
        });
      }
    } else if (swiper) {
      swiper.destroy(true, true);
      swiper = null;
    }
  };

  apply();
  mq.addEventListener("change", apply);
}

/**
 * Gallery: Swiper only on small viewports; desktop uses CSS grid.
 */
function initHotwGallerySwiper() {
  const root = document.querySelector(".hotw-gallery-swiper-root");
  if (!root || typeof Swiper === "undefined") {
    return;
  }

  let swiper = null;
  const mq = window.matchMedia("(max-width: 991.98px)");

  const apply = () => {
    if (mq.matches) {
      if (!swiper) {
        swiper = new Swiper(root, {
          slidesPerView: 1.08,
          spaceBetween: 14,
          pagination: {
            el: root.querySelector(".swiper-pagination"),
            clickable: true,
          },
        });
      }
    } else if (swiper) {
      swiper.destroy(true, true);
      swiper = null;
    }
  };

  apply();
  mq.addEventListener("change", apply);
}

/**
 * What's On: switch between calendar and upcoming panels.
 */
function initHotwWhatsOnViewToggle() {
  const root = document.querySelector(".hotw-whats-on-toggle");
  if (!root) {
    return;
  }

  const btnUpcoming = document.getElementById("hotw-whats-on-tab-upcoming");
  const btnCalendar = document.getElementById("hotw-whats-on-tab-calendar");
  const panelUpcoming = document.getElementById("whats-on-panel-upcoming");
  const panelCalendar = document.getElementById("whats-on-panel-calendar");

  if (!btnUpcoming || !btnCalendar || !panelUpcoming || !panelCalendar) {
    return;
  }

  const showCalendar = () => {
    panelCalendar.hidden = false;
    panelUpcoming.hidden = true;
    btnCalendar.classList.add("hotw-whats-on-toggle__btn--is-active");
    btnUpcoming.classList.remove("hotw-whats-on-toggle__btn--is-active");
    btnCalendar.setAttribute("aria-selected", "true");
    btnUpcoming.setAttribute("aria-selected", "false");
  };

  const showUpcoming = () => {
    panelUpcoming.hidden = false;
    panelCalendar.hidden = true;
    btnUpcoming.classList.add("hotw-whats-on-toggle__btn--is-active");
    btnCalendar.classList.remove("hotw-whats-on-toggle__btn--is-active");
    btnUpcoming.setAttribute("aria-selected", "true");
    btnCalendar.setAttribute("aria-selected", "false");
  };

  btnCalendar.addEventListener("click", showCalendar);
  btnUpcoming.addEventListener("click", showUpcoming);
}

/**
 * Vibe section: load YouTube embed with autoplay when modal opens; clear src on close to stop playback.
 */
function initHotwVibeYoutubeModal() {
  const modalEl = document.getElementById("hotwVibeYoutubeModal");
  const iframe = document.getElementById("hotwVibeYoutubeIframe");
  if (!modalEl || !iframe) {
    return;
  }

  const videoId = modalEl.getAttribute("data-youtube-id");
  if (!videoId) {
    return;
  }

  const embedBase = `https://www.youtube.com/embed/${encodeURIComponent(videoId)}`;

  modalEl.addEventListener("shown.bs.modal", function () {
    iframe.setAttribute(
      "src",
      `${embedBase}?autoplay=1&rel=0&modestbranding=1`,
    );
  });

  modalEl.addEventListener("hidden.bs.modal", function () {
    iframe.setAttribute("src", "");
  });
}

/**
 * Story page: pizza highlights carousel (always Swiper when markup present).
 */
function initHotwStoryPizzaSwiper() {
  const root = document.querySelector(".hotw-story-pizza-swiper-root");
  if (!root || typeof Swiper === "undefined") {
    return;
  }

  new Swiper(root, {
    slidesPerView: 1.15,
    spaceBetween: 18,
    centeredSlides: true,
    loop: true,
    grabCursor: true,
    speed: 500,
    pagination: {
      el: root.querySelector(".swiper-pagination"),
      clickable: true,
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2.6,
        spaceBetween: 22,
      },
      992: {
        slidesPerView: 3.4,
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 4.25,
        spaceBetween: 26,
      },
      1400: {
        slidesPerView: 5,
        spaceBetween: 28,
      },
    },
  });
}
