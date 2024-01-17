var priceTier = 0;

function showPricing() {
  jQuery('.pricing-card').hide();
  jQuery('.pricing-card:eq(' + priceTier + ')').show();
}
showPricing();

// Desktop Tier Change
jQuery('.pricing-bar__option').click(function () {
  priceTier = jQuery(this).index('.pricing-bar__option');
  showPricing();
});

//Mobile Tier Change
jQuery('.custom-option').on('click', function () {
  priceTier = jQuery(this).attr('value');
  showPricing();
});

//Desktop Active State
jQuery('.pricing-bar__option:eq(' + priceTier + ')').toggleClass(
  'pricing-bar__option--active'
);
jQuery('.pricing-bar__option').on('click', function () {
  jQuery(this).addClass('pricing-bar__option--active');
  jQuery('.pricing-bar__option')
    .not(this)
    .removeClass('pricing-bar__option--active');
});

const selectWrapper = document.querySelector('.custom-select-wrapper');

if (selectWrapper) {
  selectWrapper.addEventListener('click', function () {
    this.querySelector('.custom-select').classList.toggle('open');
  });

  for (const option of document.querySelectorAll('.custom-option')) {
    option.addEventListener('click', function () {
      if (!this.classList.contains('selected')) {
        this.parentNode
          .querySelector('.custom-option.selected')
          .classList.remove('selected');
        this.classList.add('selected');
        this.closest('.custom-select').querySelector(
          '.custom-select__trigger span'
        ).textContent = this.textContent;
      }
    });
  }
}

//Append tagging code to CTA

var pricingBtns = document.querySelectorAll('.btn-pricing');

for (var i = 0, len = pricingBtns.length; i < len; i++) {
  pricingBtns[i].href += window.location.href.substring(
    window.location.href.lastIndexOf('/') + 1
  );
}

//Add Social Pixel for 1 and 2 CTA's
const firstPricingButton = allPricingButtons[0];
const secondPricingButton = allPricingButtons[1];

function firstData() {
  if (firstPricingButton.dataset.name === 'pricingtiers–pe') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/privateequitymonthlysingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–bk') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/bankruptcymonthlysingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–cb') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/centralbankingmonthlysingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–vc') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/venturecapitalmonthlysingle'
    });
  }
}

if (firstPricingButton) {
  firstPricingButton.addEventListener('click', firstData);
}

function secondData() {
  if (firstPricingButton.dataset.name === 'pricingtiers–pe') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/privateequityannualsingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–bk') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/bankruptcyannualsingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–cb') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/centralbankingannualsingle'
    });
  } else if (firstPricingButton.dataset.name === 'pricingtiers–vc') {
    window.lintrk('track', {
      conversion_url: 'store.wsj.com/venturecapitalannualsingle'
    });
  }
}

if (secondPricingButton) {
  secondPricingButton.addEventListener('click', secondData);
}
