document.addEventListener("DOMContentLoaded", function () {

  // AOS
  if (typeof (AOS) !== "undefined") {
    AOS.init();
  }

  // -------------------------  Top FV Swiper  -----------------------------------

  let topFvSwiper;
  topFvSwiper = new Swiper(".swiper-fv-top", {
    centeredSlides: true,
    loop: true,
    speed: 1000,
    slidesPerView: 1,
    effect: "fade",
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".fv-top-next-button",
      prevEl: ".fv-top-prev-button",
    },
  });

  // -------------------------  Product Detail Swiper  -----------------------------------
  const thumbSwiperEl = document.querySelector('.thumbImageSwiper');
  const mainSwiperEl = document.querySelector('.mainImageSwiper');
  if (thumbSwiperEl && mainSwiperEl) {
    var thumbSwiper = new Swiper('.thumbImageSwiper', {
      slidesPerView: 4,
      spaceBetween: 8,
      watchSlidesProgress: true,
      breakpoints: {
        640: {
          slidesPerView: 4
        },
        1024: {
          slidesPerView: 6
        },
      },
    });
    var mainSwiper = new Swiper('.mainImageSwiper', {
      spaceBetween: 10,
      loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
      speed: 1000,
      thumbs: {
        swiper: thumbSwiper,
      }
    });
  }

  // -------------------------  Related Products Swiper  -----------------------------------

  const relatedProductsSwiper = new Swiper('#productImageSlider', {
    loop: true,
    zoom: true,
    slidesPerView: 4,
    spaceBetween: 4,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      640: {
        slidesPerView: 4,
        spaceBetween: 6
      },
      1024: {
        slidesPerView: 8,
        spaceBetween: 8
      },
    },
    autoplay: {
      delay: 2500,
    },
    speed: 600,
  });

  // -------------------------  Others  -----------------------------------

  // Scroll to Top Button
  const scrollToTopBtn = document.getElementById("scrollToTopBtn");
  if (scrollToTopBtn) {
    // Show/hide button based on scroll position
    function toggleScrollToTopButton() {
      if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.remove("opacity-0", "pointer-events-none");
        scrollToTopBtn.classList.add("opacity-100", "pointer-events-auto");
      } else {
        scrollToTopBtn.classList.add("opacity-0", "pointer-events-none");
        scrollToTopBtn.classList.remove("opacity-100", "pointer-events-auto");
      }
    }

    // Scroll to top function
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    }

    // Event listeners
    window.addEventListener("scroll", toggleScrollToTopButton);
    scrollToTopBtn.addEventListener("click", scrollToTop);

    // Initial check
    toggleScrollToTopButton();
  }

  // -------------------------  Search form (mobile)  -----------------------------------
  const searchBtn = document.getElementById("searchBtn");
  const searchForm = document.getElementById("searchForm");
  if (searchBtn && searchForm) {
    searchBtn.addEventListener("click", function () {
      searchForm.classList.toggle("searchForm--open");
    });
    document.addEventListener("click", function (e) {
      if (
        searchForm.classList.contains("searchForm--open") &&
        !searchForm.contains(e.target) &&
        !searchBtn.contains(e.target)
      ) {
        searchForm.classList.remove("searchForm--open");
      }
    });
  }

  // -------------------------  Sidebar (mobile)  -----------------------------------
  const handleSidebarBtn = document.getElementById("handleSidebarBtn");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  const sidebarBtnIconOpen = document.getElementById("sidebarBtnIconOpen");
  const sidebarBtnIconClose = document.getElementById("sidebarBtnIconClose");
  const sidebarBtnLabel = document.getElementById("sidebarBtnLabel");

  function isSidebarOpen() {
    return sidebar && sidebar.classList.contains("sidebar--open");
  }

  function openSidebar() {
    if (sidebar) sidebar.classList.add("sidebar--open");
    if (overlay) overlay.classList.add("overlay--open");
    if (sidebarBtnIconOpen) sidebarBtnIconOpen.classList.add("hidden");
    if (sidebarBtnIconClose) sidebarBtnIconClose.classList.remove("hidden");
    if (sidebarBtnLabel) sidebarBtnLabel.textContent = "閉じる";
  }

  function closeSidebar() {
    if (sidebar) sidebar.classList.remove("sidebar--open");
    if (overlay) overlay.classList.remove("overlay--open");
    if (sidebarBtnIconOpen) sidebarBtnIconOpen.classList.remove("hidden");
    if (sidebarBtnIconClose) sidebarBtnIconClose.classList.add("hidden");
    if (sidebarBtnLabel) sidebarBtnLabel.textContent = "カテゴリを開く";
  }

  function toggleSidebar() {
    if (isSidebarOpen()) closeSidebar();
    else openSidebar();
  }

  if (handleSidebarBtn) handleSidebarBtn.addEventListener("click", toggleSidebar);
  if (overlay) overlay.addEventListener("click", closeSidebar);

  // ------------- Image Zoom on Hover for .zoomable --------------
  const zoomable = document.querySelectorAll('.zoomable');

  zoomable.forEach(item => {
    let lens = null;

    // Create the lens and append to body on mouseenter
    item.addEventListener('mouseenter', e => {
      lens = document.createElement("span");
      lens.classList.add('zoom-lens');
      lens.style.position = 'absolute';
      lens.style.pointerEvents = 'none';
      lens.style.width = '120px';
      lens.style.height = '120px';
      lens.style.borderRadius = '50%';
      lens.style.boxShadow = '0 0 8px 1px rgba(0,0,0,0.25)';
      lens.style.border = '2px solid #fff';
      lens.style.zIndex = '9999';
      lens.style.backgroundImage = `url('${item.src}')`;
      lens.style.backgroundRepeat = 'no-repeat';
      lens.style.backgroundSize = (item.width * 2) + "px";
      document.body.appendChild(lens);
    });

    // Move the lens
    item.addEventListener('mousemove', e => {
      if (!lens) return;
      let rect = item.getBoundingClientRect();
      let zoom = 2;
      let lensWidth = lens.offsetWidth;
      let lensHeight = lens.offsetHeight;
      let pageX = e.pageX;
      let pageY = e.pageY;

      // Position the lens centered to the mouse
      lens.style.left = (pageX - lensWidth / 2) + 'px';
      lens.style.top = (pageY - lensHeight / 2) + 'px';

      // Compute background position relative to image
      let x = pageX - rect.left - window.pageXOffset;
      let y = pageY - rect.top - window.pageYOffset;
      lens.style.backgroundSize = (item.width * zoom) + "px";
      lens.style.backgroundPosition = `-${(x * zoom - lensWidth / 2)}px -${(y * zoom - lensHeight / 2)}px`;
    });

    // Remove lens on mouseleave
    item.addEventListener('mouseleave', e => {
      if (lens && lens.parentNode) {
        lens.parentNode.removeChild(lens);
        lens = null;
      }
    });
  });

  // -------------------------  History image modal  -----------------------------------
  const historyGrid = document.getElementById("history-image-grid");
  const historyModal = document.getElementById("history-image-modal");
  const historyModalImg = document.getElementById("history-modal-image");
  const historyModalClose = document.getElementById("history-modal-close");
  const historyModalPrev = document.getElementById("history-modal-prev");
  const historyModalNext = document.getElementById("history-modal-next");
  if (historyGrid && historyModal && historyModalImg) {
    let historyUrls = [];
    try {
      const raw = historyGrid.getAttribute("data-image-urls");
      if (raw) historyUrls = JSON.parse(raw);
    } catch (e) { }
    if (historyUrls.length) {
      let historyCurrentIndex = 0;
      function showHistoryModal(index) {
        historyCurrentIndex = (index + historyUrls.length) % historyUrls.length;
        historyModalImg.src = historyUrls[historyCurrentIndex];
        historyModal.classList.remove("hidden");
        historyModal.classList.add("flex");
        document.body.style.overflow = "hidden";
        if (historyModalPrev) historyModalPrev.disabled = historyUrls.length <= 1;
        if (historyModalNext) historyModalNext.disabled = historyUrls.length <= 1;
      }
      function hideHistoryModal() {
        historyModal.classList.add("hidden");
        historyModal.classList.remove("flex");
        document.body.style.overflow = "";
      }
      function goHistoryPrev() {
        if (historyUrls.length <= 1) return;
        historyCurrentIndex = (historyCurrentIndex - 1 + historyUrls.length) % historyUrls.length;
        historyModalImg.src = historyUrls[historyCurrentIndex];
      }
      function goHistoryNext() {
        if (historyUrls.length <= 1) return;
        historyCurrentIndex = (historyCurrentIndex + 1) % historyUrls.length;
        historyModalImg.src = historyUrls[historyCurrentIndex];
      }
      historyGrid.querySelectorAll(".history-image-trigger").forEach((btn) => {
        btn.addEventListener("click", function () {
          const i = parseInt(this.getAttribute("data-index"), 10);
          if (!isNaN(i)) showHistoryModal(i);
        });
      });
      if (historyModalClose) historyModalClose.addEventListener("click", hideHistoryModal);
      if (historyModalPrev) historyModalPrev.addEventListener("click", goHistoryPrev);
      if (historyModalNext) historyModalNext.addEventListener("click", goHistoryNext);
      historyModal.addEventListener("click", function (e) {
        if (e.target === historyModal) hideHistoryModal();
      });
      document.addEventListener("keydown", function (e) {
        if (!historyModal.classList.contains("hidden")) {
          if (e.key === "Escape") hideHistoryModal();
          if (e.key === "ArrowLeft") goHistoryPrev();
          if (e.key === "ArrowRight") goHistoryNext();
        }
      });
    }
  }
});