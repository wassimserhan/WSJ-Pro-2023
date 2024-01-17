var $ = jQuery;

$(window).on('load', function () {
  var emailAddress = '';
  // Production API below
  var newsletterUrl = 'http://www.s.dev.wsj.com/newsletters/svc/signup/2';
  // Below local testing API, Ghost www.premiumnewsletters.wsj.com under /etc/hosts and then gulp this under www.premiumnewsletters.wsj.com:3000/ (reach out to thowfeeq in dowjones if you need anything regarding API or need login credentials for QA reach out to @subashini.balagangatharan in slack)
  // var newsletterUrl = "http://www.s.dev.wsj.com/newsletters/svc/signup/2";

  //   getEmailAddress();

  // $(document).on('click', '.btn-products', function () {

  // })
  $('.btn--products-sign').click(function () {
    var dynamicUrl = $(this).data('name');
    // var subscribed = $(this).html();
    if (emailAddress) {
      // if (subscribed != 'SUBSCRIBED') {
      setTimeout(function () {
        $.ajax({
          type: 'POST',
          dataType: 'json',
          url: newsletterUrl,
          headers: {
            'X-HTTP-Method-Override': 'PATCH',
            'Content-Type': 'application/json'
          },
          data:
            '{"email": "' + emailAddress + '", "subscription":{"197":true}}',
          xhrFields: {
            withCredentials: true
          },
          crossDomain: true,
          success: function (data) {},
          error: function (e) {
            console.log('err');
          }
        });
      }, 1000);
      // }
    } else {
      window.open(
        'https://accounts.dowjones.com/auth/wsjpro/login?target=http://www.wsj.com/pro/' +
          dynamicUrl,
        '_blank' // <- This is what makes it open in a new window.
      );
    }
  });
});
