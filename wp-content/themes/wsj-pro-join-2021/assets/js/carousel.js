var carousel = jQuery('.carousel').flickity({
  fullscreen: true, lazyLoad: 2, autoPlay: 7000, cellAlign: "left", contain: true, initialIndex: 0, dragThreshold: 10, adaptiveHeight: true, groupCells: 2,
  arrowShape: {
    x0: 10,
    x1: 60, y1: 45,
    x2: 60, y2: 45,
    x3: 60
  }
});

var flkty = carousel.data('flickity');
