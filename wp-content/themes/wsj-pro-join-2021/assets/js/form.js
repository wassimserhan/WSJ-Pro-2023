// This form code below creates a alternative select tags where you can add css to the option tag.
// Iterate over each select element
var formIndustry, formState, formCountry, formJobfunction;
jQuery('select').each(function () {
  // Cache the number of options
  var jQuerythis = jQuery(this),
    numberOfOptions = jQuery(this).children('option').length;

  // Hides the select element
  jQuerythis.addClass('s-hidden');

  // Wrap the select element in a div
  jQuerythis.wrap('<div class="select"></div>');

  // Insert a styled div to sit over the top of the hidden select element
  jQuerythis.after('<div class="styledSelect"></div>');

  // Cache the styled div
  var jQuerystyledSelect = jQuerythis.next('div.styledSelect');

  // Show the first select option in the styled div
  jQuerystyledSelect.text(jQuerythis.children('option').eq(0).text());

  // Insert an unordered list after the styled div and also cache the list
  var jQuerylist = jQuery('<ul />', {
    class: 'options'
  }).insertAfter(jQuerystyledSelect);

  // Insert a list item into the unordered list for each select option
  for (var i = 0; i < numberOfOptions; i++) {
    if (i > 0) {
      jQuery('<li />', {
        text: jQuerythis.children('option').eq(i).text().toLowerCase(),
        rel: jQuerythis.children('option').eq(i).data('type'),
        'data-filter': jQuerythis.children('option').eq(i).data('filter')
      }).appendTo(jQuerylist);
    }
  }

  // Cache the list items
  var jQuerylistItems = jQuerylist.children('li');

  // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
  jQuerystyledSelect.click(function (e) {
    e.stopPropagation();
    jQuery('div.styledSelect.active').each(function () {
      jQuery(this).removeClass('active').next('ul.options').hide();
    });
    jQuery(this).toggleClass('active').next('ul.options').toggle();
  });

  // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
  // Updates the select element to have the value of the equivalent option
  jQuerylistItems.click(function (e) {
    e.stopPropagation();
    jQuerystyledSelect.text(jQuery(this).text()).removeClass('active');
    jQuerythis.val(jQuery(this).attr('rel'));

    var selectType = jQuery(this).attr('rel');
    if (selectType == 'country') {
      formCountry = jQuery(this).text();

      if (jQuery('.state-form-field').hasClass('always-hide')) {
        jQuery('.state-form-field').removeClass('always-hide');
      }

      if (formCountry.toLowerCase() == 'united states') {
        jQuery('li[data-filter="united states"]').show();
        jQuery('li[data-filter="canada"]').hide();

        document.getElementById('field100').checked = true;
      } else if (formCountry.toLowerCase() == 'canada') {
        jQuery('li[data-filter="united states"]').hide();
        jQuery('li[data-filter="canada"]').show();
      } else {
        jQuery('.state-form-field').addClass('always-hide');

        document.getElementById('field100').checked = false;
      }

      // Alternative check for 2nd form
      if (formCountry.toLowerCase() == 'united states') {
        jQuery('li[data-filter="united states"]').show();
        jQuery('li[data-filter="canada"]').hide();

        document.getElementById('field1002').checked = true;
      } else if (formCountry.toLowerCase() == 'canada') {
        jQuery('li[data-filter="united states"]').hide();
        jQuery('li[data-filter="canada"]').show();
      } else {
        jQuery('.state-form-field').addClass('always-hide');

        document.getElementById('field1002').checked = false;
      }
    } else if (selectType == 'state') {
      formState = jQuery(this).text();
    } else if (selectType == 'industry') {
      formIndustry = jQuery(this).text();
    } else if (selectType == 'jobFunction') {
      formJobfunction = jQuery(this).text();
    }

    jQuerylist.hide();
    /* alert(jQuerythis.val()); Uncomment this for demonstration! */
  });

  // Hides the unordered list when clicking outside of it
  jQuery(document).click(function () {
    jQuerystyledSelect.removeClass('active');
    jQuerylist.hide();
  });
});

//Tags

if (document.getElementById('utm_medium')) {
  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  document.getElementById('utm_medium').value =
    getParameterByName('utm_medium');
  document.getElementById('utm_source').value =
    getParameterByName('utm_source');
  document.getElementById('utm_campaign').value =
    getParameterByName('utm_campaign');
  document.getElementById('utm_term').value = getParameterByName('utm_term');
  document.getElementById('utm_content').value =
    getParameterByName('utm_content');

  document.getElementById('SFDCCampaignId').value = getParameterByName('CID')
    ? getParameterByName('CID')
    : '';

  document.getElementById('referrerURL').value = window.location.href;
}

//Form modal

const allPricingButtons = document.querySelectorAll('.btn--pricing');
const thirdPricingButton = allPricingButtons[2];
const modal_container = document.getElementById('form__modal-container');
const close = document.getElementById('form__modal-close');

// var jQuerythis = jQuery('select'),
//   numberOfOptions = jQuery('select').children('option').length;

// var jQuerystyledSelect = jQuerythis.next('div.styledSelect');

if (thirdPricingButton) {
  thirdPricingButton.addEventListener('click', () => {
    modal_container.classList.add('form__show');
    body.style.overflow = 'hidden';
    //resets optin
    document.getElementById('field100').checked = false;
  });

  close.addEventListener('click', closeModal);

  function closeModal() {
    modal_container.classList.remove('form__show');
    body.style.overflow = 'auto';
    document.getElementById('form1').reset();
    document.getElementById('form2').reset();
    // jQuerystyledSelect.text(jQuerythis.children('option').eq(0).text());
  }
}

//Form Modal for form-module

const formModalBTN = document.getElementById('formModal');
const formModule_modal_container = document.getElementById(
  'layout-with-form__modal-container'
);
const formModule_close = document.getElementById(
  'layout-with-form__modal-close'
);

if (formModalBTN) {
  formModalBTN.addEventListener('click', () => {
    formModule_modal_container.classList.add('layout-with-form__show');
    body.style.overflow = 'hidden';
    //resets optin
    document.getElementById('field1002').checked = false;
  });

  formModule_close.addEventListener('click', closeModal);

  function closeModal() {
    formModule_modal_container.classList.remove('layout-with-form__show');
    body.style.overflow = 'auto';
  }
}

//Form Modal for popup

if (!Cookies.get('popup')) {
  setTimeout(function () {
    jQuery('.popup-overlay').css('display', 'block');
    Cookies.set('popup', 'active', {
      expires: 30,
      path: window.location.pathname
    });
  }, 10000);
}

jQuery('.popup-close, .btn--popup').click(function () {
  jQuery('.popup').hide();
  jQuery('.popup-overlay').css({
    'background-color': 'transparent',
    'z-index': '-99'
  });
});

const popupButton = document.querySelectorAll('.btn--popup');

for (var i = 0, len = popupButton.length; i < len; i++) {
  if (
    popupButton[i] &&
    // popupButton[i].dataset.name === 'privateequity' &&
    popupButton[i].dataset.action === 'form'
  ) {
    // Opens form modal
    popupButton[i].addEventListener('click', () => {
      formModule_modal_container.classList.add('layout-with-form__show');
      body.style.overflow = 'hidden';
    });
    if (formModule_close) {
      formModule_close.addEventListener('click', closeModal);
    }
    function closeModal() {
      formModule_modal_container.classList.remove('layout-with-form__show');
      body.style.overflow = 'auto';
    }
  } else if (
    popupButton[i] &&
    // popupButton[i].dataset.name === 'privateequity' &&
    popupButton[i].dataset.action === 'pricing'
  ) {
    // Scrolls to pricing module
    popupButton[i].addEventListener('click', () => {
      document.getElementById('pricing').scrollIntoView({ behavior: 'smooth' });
    });
  } else if (popupButton[i]) {
    popupButton[i].addEventListener('click', () => {
      window.open = popupButton[i].dataset.url;
    });
  }
}
