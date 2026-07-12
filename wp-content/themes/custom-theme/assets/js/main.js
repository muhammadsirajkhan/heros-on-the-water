document.addEventListener("DOMContentLoaded", function () {
  initHotwTickerSwiper();
  initMobileMenu();
  initHotwPolaroidSwiper();
  initHotwGallerySwiper();
  initHotwWhatsOnViewToggle();
  initHotwVibeYoutubeModal();
  initHotwStoryPizzaSwiper();
  initHotwVisitorsSwiper();
  initHotwTimelineSwiper();
  initHotwDonateWidget();
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
 * YouTube modals: autoplay on open; clear iframe src on close to stop/reset.
 * Works for any .modal[data-youtube-id] with an iframe inside (home video, vibe, journey, etc.).
 * Triggers with [data-youtube-id] can update the shared modal video before open.
 */
function initHotwVibeYoutubeModal() {
  const modals = document.querySelectorAll(".modal[data-youtube-id]");
  if (!modals.length) {
    return;
  }

  document.querySelectorAll('[data-bs-toggle="modal"][data-youtube-id]').forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      const targetSel = trigger.getAttribute("data-bs-target");
      const videoId = trigger.getAttribute("data-youtube-id");
      if (!targetSel || !videoId) {
        return;
      }
      const modalEl = document.querySelector(targetSel);
      if (modalEl) {
        modalEl.setAttribute("data-youtube-id", videoId);
      }
    });
  });

  modals.forEach(function (modalEl) {
    const iframe =
      modalEl.querySelector("iframe.hotw-youtube-modal__iframe") ||
      modalEl.querySelector("iframe");
    if (!iframe) {
      return;
    }

    modalEl.addEventListener("shown.bs.modal", function () {
      const videoId = modalEl.getAttribute("data-youtube-id");
      if (!videoId) {
        return;
      }
      iframe.setAttribute(
        "src",
        "https://www.youtube.com/embed/" +
          encodeURIComponent(videoId) +
          "?autoplay=1&rel=0&modestbranding=1",
      );
    });

    modalEl.addEventListener("hidden.bs.modal", function () {
      iframe.setAttribute("src", "");
    });
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

/**
 * Home visitors carousel — freeMode + draggable Swiper scrollbar.
 */
function initHotwVisitorsSwiper() {
  const root = document.querySelector(".hotw-visitors-swiper-root");
  if (!root || typeof window.Swiper === "undefined") {
    return;
  }

  if (root.swiper) {
    return;
  }

  const scrollbar = root.querySelector(".hotw-visitors__scrollbar");
  const prev = root.querySelector(".hotw-visitors__nav--prev");
  const next = root.querySelector(".hotw-visitors__nav--next");

  new window.Swiper(root, {
    slidesPerView: 1.25,
    spaceBetween: 20,
    grabCursor: true,
    watchOverflow: false,
    // freeMode + no loop = reliable scrollbar dragging
    freeMode: {
      enabled: true,
      momentum: true,
      momentumRatio: 0.85,
      sticky: false,
    },
    scrollbar: {
      el: scrollbar,
      draggable: true,
      hide: false,
      snapOnRelease: false,
    },
    navigation: {
      prevEl: prev,
      nextEl: next,
    },
    breakpoints: {
      576: { slidesPerView: 1.7, spaceBetween: 22 },
      768: { slidesPerView: 2.2, spaceBetween: 24 },
      992: { slidesPerView: 2.7, spaceBetween: 26 },
      1200: { slidesPerView: 3.2, spaceBetween: 28 },
      1400: { slidesPerView: 3.45, spaceBetween: 30 },
    },
  });
}

/**
 * Journey timeline carousel with custom prev/next (no bottom scroller).
 * Keeps slide position stable when opening/closing the YouTube modal.
 */
function initHotwTimelineSwiper() {
  const root = document.querySelector(".hotw-timeline-swiper-root");
  if (!root || typeof Swiper === "undefined") {
    return;
  }

  const section = root.closest(".hotw-journey-timeline");
  const prev = section
    ? section.querySelector(".hotw-timeline-nav__btn--prev")
    : null;
  const next = section
    ? section.querySelector(".hotw-timeline-nav__btn--next")
    : null;

  const swiper = new Swiper(root, {
    slidesPerView: 1.15,
    spaceBetween: 20,
    grabCursor: true,
    watchOverflow: true,
    threshold: 10,
    preventClicks: true,
    preventClicksPropagation: true,
    noSwipingSelector: ".hotw-timeline-card__media, .hotw-timeline-card__play",
    navigation: {
      prevEl: prev,
      nextEl: next,
    },
    breakpoints: {
      768: { slidesPerView: 2, spaceBetween: 24 },
      1200: { slidesPerView: 3, spaceBetween: 28 },
    },
  });

  let lockedIndex = 0;

  const restoreSlide = function () {
    if (!swiper || swiper.destroyed) {
      return;
    }
    swiper.allowTouchMove = true;
    swiper.slideTo(lockedIndex, 0, false);
  };

  root.querySelectorAll(".hotw-timeline-card__media").forEach(function (btn) {
    btn.addEventListener(
      "pointerdown",
      function (event) {
        event.stopPropagation();
      },
      true,
    );
  });

  const modal = document.getElementById("hotwJourneyYoutubeModal");
  if (!modal) {
    return;
  }

  modal.addEventListener("show.bs.modal", function () {
    lockedIndex = swiper.activeIndex;
    swiper.allowTouchMove = false;
  });

  modal.addEventListener("shown.bs.modal", function () {
    lockedIndex = swiper.activeIndex;
    swiper.slideTo(lockedIndex, 0, false);
  });

  modal.addEventListener("hide.bs.modal", function () {
    lockedIndex = swiper.activeIndex;
    swiper.allowTouchMove = false;
  });

  modal.addEventListener("hidden.bs.modal", function () {
    window.requestAnimationFrame(function () {
      restoreSlide();
      window.setTimeout(restoreSlide, 50);
    });
  });
}

/**
 * Home donate widget amount / tab toggles (static UI).
 */
function initHotwDonateWidget() {
  const root = document.querySelector("[data-hotw-donate-widget]");
  if (!root) {
    return;
  }

  const tabs = root.querySelectorAll(".hotw-donate-card__tab");
  const amounts = root.querySelectorAll(".hotw-donate-card__amount");

  const syncAmountSuffix = (mode) => {
    amounts.forEach((btn) => {
      const label = btn.querySelector(".hotw-donate-card__amount-label");
      if (!label || btn.getAttribute("data-amount") === "other") {
        return;
      }
      const value = btn.getAttribute("data-amount");
      if (!value) {
        return;
      }
      label.textContent =
        mode === "once" ? "£" + value : "£" + value + "/mo";
    });
  };

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      tabs.forEach((t) => {
        t.classList.remove("is-active");
        t.setAttribute("aria-selected", "false");
      });
      this.classList.add("is-active");
      this.setAttribute("aria-selected", "true");
      syncAmountSuffix(this.getAttribute("data-mode") || "monthly");
    });
  });

  amounts.forEach((btn) => {
    btn.addEventListener("click", function () {
      amounts.forEach((a) => a.classList.remove("is-active"));
      this.classList.add("is-active");
    });
  });
}

/**
 * Values ticker — Swiper continuous linear marquee.
 * Always initializes (adds .swiper-initialized). Decorative; aria-hidden on root.
 */
function initHotwTickerSwiper() {
  const roots = document.querySelectorAll(".hotw-ticker-swiper");
  if (!roots.length) {
    return;
  }

  const SwiperLib = typeof window.Swiper !== "undefined" ? window.Swiper : null;
  if (!SwiperLib) {
    return;
  }

  roots.forEach(function (el) {
    if (el.swiper || el.classList.contains("swiper-initialized")) {
      return;
    }

    const swiper = new SwiperLib(el, {
      slidesPerView: "auto",
      spaceBetween: 0,
      loop: true,
      // loopAdditionalSlides: 6,
      // speed: 3000,
      allowTouchMove: false,
      grabCursor: false,
      watchOverflow: false,
      autoplay: {
        enabled: true,
        delay: 1000,
        disableOnInteraction: false,
        pauseOnMouseEnter: false,
      },
      // on: {
      //   init: function (instance) {
      //     if (instance.wrapperEl) {
      //       instance.wrapperEl.style.transitionTimingFunction = "linear";
      //     }
      //     if (instance.autoplay && typeof instance.autoplay.start === "function") {
      //       instance.autoplay.start();
      //     }
      //   },
      //   setTransition: function (instance, duration) {
      //     if (instance.wrapperEl && duration > 0) {
      //       instance.wrapperEl.style.transitionTimingFunction = "linear";
      //     }
      //   },
      // },
    });

    el.classList.add("hotw-ticker-swiper--ready");
    return swiper;
  });
}
