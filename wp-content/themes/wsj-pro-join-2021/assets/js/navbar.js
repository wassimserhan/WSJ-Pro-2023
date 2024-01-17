// Tracking Code + Smooth Scroll
var headerHeight = jQuery('header').height();

jQuery('a').not('#formModal a').on('click', trackingCode);

function trackingCode() {
  var href = jQuery(this).attr('href');
  var anchorTag = href.substr(href.indexOf('#'));

  var str = window.location.href.slice(window.location.href.indexOf('?') + 1);
  var url = window.location.href.split(/[?#]/)[0];
  var querystring = str.split('?').pop().split('#')[0];

  var baseUrl;
  var getUrl = window.location;

  const pathname = window.location.pathname;
  const pathnameParts = pathname ? pathname.split('/').filter(Boolean) : '';
  const subPage = pathnameParts ? pathnameParts.slice(1).join('/') : '';

  if (
    window.location.hostname == '127.0.0.1' ||
    window.location.hostname == 'localhost'
  ) {
    if (location.pathname.length > 37) {
      baseUrl =
        getUrl.protocol +
        '//' +
        getUrl.host +
        '/' +
        getUrl.pathname.split('/')[1] +
        '/' +
        getUrl.pathname.split('/')[2];
    } else {
      baseUrl = url;
    }
  } else if (
    window.location.hostname == 'djadminstag.dowjones.com' ||
    window.location.hostname == 'djadmin.dowjones.com'
  ) {
    if (subPage) {
      baseUrl =
        getUrl.protocol +
        '//' +
        getUrl.host +
        '/' +
        getUrl.pathname.split('/')[1];
    } else {
      baseUrl = url;
    }
  } else {
    if (location.pathname.substring(1)) {
      baseUrl = window.location.origin;
    } else {
      baseUrl = url;
    }
  }

  if (href && querystring) {
    if (querystring.indexOf('=') >= 0) {
      if (href.indexOf('#') < 0) {
        jQuery(this).attr('href', href + '?' + querystring);
      } else if (href.indexOf('#') >= 0) {
        jQuery(this).attr('href', baseUrl + '?' + querystring + anchorTag);
      } else {
        jQuery(this).attr('href', href + '?' + querystring);
      }
    } else if (href.indexOf('#') >= 0) {
      jQuery(this).attr('href', baseUrl + anchorTag);
    }
  }

  jQuery('html, body')
    .not('#formModal a')
    .animate(
      {
        scrollTop: jQuery(this.hash).offset().top - headerHeight
      },
      800
    );
}

// HAMBURGER NAVIGATION

// Side Nav open/close on Hamburger click
const hamburger = document.querySelector('.hamburger');
const body = document.getElementsByTagName('body')[0];
const main = document.querySelector('.main-container');
const sideNav = document.querySelector('.nav__dropdown');

hamburger.addEventListener('click', menu);

function menu() {
  main.classList.toggle('push-main');
  sideNav.classList.toggle('show-nav');
  main.classList.toggle('pull-main');
  sideNav.classList.toggle('hide-nav');
  body.classList.toggle('fixed-position');
  hamburger.classList.toggle('is-active');
}

// Side Nav open/close on menu item click
const navItems = document.querySelectorAll('.nav__dropdown-items');
const subnavItems = document.querySelectorAll('.nav__submenu-items');

navItems.forEach(item => {
  item.addEventListener('click', closeSideMenu);
});

subnavItems.forEach(item => {
  item.addEventListener('click', closeSideMenu);
});

function closeSideMenu() {
  hamburger.classList.remove('is-active');
  main.classList.remove('push-main');
  sideNav.classList.remove('show-nav');
  body.classList.remove('fixed-position');
}
