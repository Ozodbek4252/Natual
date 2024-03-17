// Swipers
const swiperFeatures = new Swiper('.swiper-features', {
  slidesPerView: 3,
  spaceBetween: 0,
  loop: true,
  speed: 750,
  navigation: {
    nextEl: '.swiper-button-next-features',
    prevEl: '.swiper-button-prev-features',
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    600: {
      slidesPerView: 3,
    },
  },
});

const swiperPartners = new Swiper('.swiper-partners', {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next-partners',
    prevEl: '.swiper-button-prev-partners',
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

// Fancybox
Fancybox.bind('[data-fancybox]', {
  // Your custom options
});

// Navbar
window.onscroll = () => {
  if (
    document.body.scrollTop > 100 ||
    document.documentElement.scrollTop > 100
  ) {
    document.getElementById('navbar').classList.add('navbar-active');
  } else {
    document.getElementById('navbar').classList.remove('navbar-active');
  }
};

document.getElementById('toggle-button').addEventListener('click', () => {
  openNav();
});

document.getElementById('close-button').addEventListener('click', () => {
  closeNav();
});

document.getElementById('order-now-btn').addEventListener('click', () => {
  closeNav();
});

document.querySelectorAll('.navbar ul li a').forEach((element) => {
  element.addEventListener('click', () => {
    closeNav();
  });
});

function openNav() {
  document.getElementById('navbar').classList.add('open');
  document.getElementById('nav-links').classList.add('active');
  document.getElementsByTagName('body')[0].classList.add('overflow-hidden');
}

function closeNav() {
  document.getElementById('navbar').classList.remove('open');
  document.getElementById('nav-links').classList.remove('active');
  document.getElementsByTagName('body')[0].classList.remove('overflow-hidden');
}

// Aos
AOS.init();

// Modals //

// Modal Form
const modalForm = document.getElementById('modal-form');
const orderNowBtn = document.getElementById('order-now-btn');
const closeBtn = document.getElementById('close-modal');

orderNowBtn.onclick = function () {
  modalForm.style.display = 'flex';
  document.getElementsByTagName('body')[0].classList.add('overflow-hidden');
};
closeBtn.onclick = function () {
  modalForm.style.display = 'none';
  document.getElementsByTagName('body')[0].classList.remove('overflow-hidden');
};
window.onclick = function (event) {
  if (event.target == modalForm) {
    modalForm.style.display = 'none';
    document
      .getElementsByTagName('body')[0]
      .classList.remove('overflow-hidden');
  }
};

// IMask
IMask(document.getElementById('phone-number'), {
  mask: '+{998} (00) 000 00 00',
  placeholderChar: '_',
  lazy: false,
});
