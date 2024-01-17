<!-- header.php -->
<?php
/**
 * The Header template
 *
 *
 * @package WSJ EVENT TEMPLATE
 */
global $post;
?>
<!DOCTYPE html>
<!--[if IE 7]>
    <html class="ie ie7" <?php language_attributes(); ?>>
    <![endif]-->
<!--[if IE 8]>
    <html class="ie ie8" <?php language_attributes(); ?>>
    <![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
  <!--<![endif]-->

  <head>



    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <meta name="breakpoint" content="phone" media="(max-width: 479px)">
    <meta name="breakpoint" content="small-tablet" media="(min-width: 480px) and (max-width: 639px)">
    <meta name="breakpoint" content="tablet" media="(min-width: 640px) and (max-width: 1023px)">
    <meta name="breakpoint" content="desktop" media="(min-width: 1024px)">
    <meta name="breakpoint" content="widescreen" media="(min-width: 1280px)">
    <meta name="breakpoint" content="retina" media="only screen and (-webkit-min-device-pixel-ratio : 2)">
    <link rel="profile" href="#">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css">
    <?php wp_head(); ?>
    <link rel='shortcut icon' type='image/x-icon'
      href='<?php echo get_template_directory_uri(); ?>/dist/img/favicon.png' />

    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/EscrowBannerLight.woff'
      type="font/woff" crossorigin="anonymous">

    <link rel="preload" as="font"
      href='<?php echo get_template_directory_uri(); ?>/dist/fonts/DJ5EscrowLightDisplay.woff' type="font/woff"
      crossorigin="anonymous">
    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/DJ5MastheadRoman.woff'
      type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font"
      href='<?php echo get_template_directory_uri(); ?>/dist/fonts/EscrowBannerLightItalic.woff' type="font/woff"
      crossorigin="anonymous">

    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/RetinaExtraLight.woff'
      type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font"
      href='<?php echo get_template_directory_uri(); ?>/dist/fonts/RetinaExtraLightItalic.woff' type="font/woff"
      crossorigin="anonymous">
    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/RetinaLight.woff'
      type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/RetinaBook.woff'
      type="font/woff" crossorigin="anonymous">
    <link rel="preload" as="font" href='<?php echo get_template_directory_uri(); ?>/dist/fonts/RetinaMedium.woff'
      type="font/woff" crossorigin="anonymous">

    <!-- Ace -->

    <?php include 'cpm-head.php'; ?>
    <!-- Ace -->

    <!-- Start CMP Code -->
    <script>
    function loadTealiumScript() {
      console.log('Entered tealium function');

      // Omniture Script
      const utagScript = document.createElement('script');
      utagScript.src = "//tags.tiqcdn.com/utag/wsjdn/djmarketing/prod/utag.js";
      utagScript.async = true;
      document.body.appendChild(utagScript);
      console.log('Finished loading Omniture script');
      // End Omniture Script

      // Load Drift
      const driftVendorId = '62c48f84514a3005144cc281';
      if (driftVendorId) {
        window.__ace('djcmp', 'customVendorIsEnabled', loadDriftScript, [driftVendorId]);
      }

      // Load Google Analytics script
      const gaVendorIds = ["5ed7a9a9e0e22001da9d52ad", "5e542b3a4cd8884eb41b5a72", "5ed0eb688a76503f1016578e",
        "5e71760b69966540e4554f01", "5fac56cd1ba05165880458ad"
      ];
      if (Array.isArray(gaVendorIds) && gaVendorIds.length > 0) {
        const disabled = gaVendorIds.map(vendorId => djcmp.customVendorIsEnabled(vendorId)).filter(isEnabled => !
          isEnabled, []);
        if (disabled.length === 0) {
          loadGoogleTagManagerScript();
        }
      }
    }

    function loadGoogleTagManagerScript() {
      // Google Tag Manager
      const googleTagScript = document.createElement('script');
      googleTagScript.type = "text/javascript";
      googleTagScript.async = true;
      googleTagScript.text =
        "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-WZSHC7V');"; // use this for inline script
      document.body.appendChild(googleTagScript);
      console.log('Finished loading GA script');
      // End Google Tag Manager

    }

    function loadDriftScript(isVendorEnabled) {
      // Drift Code
      if (isVendorEnabled) {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
          if (t.invoked) return void(window.console && console.error && console.error("Drift snippet included twice."));
          t.invoked = !0, t.methods = ["identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide",
              "off", "on"
            ],
            t.factory = function(e) {
              return function() {
                var n = Array.prototype.slice.call(arguments);
                return n.unshift(e), t.push(n), t;
              };
            }, t.methods.forEach(function(e) {
              t[e] = t.factory(e);
            }), t.load = function(t) {
              var e = 3e5,
                n = Math.ceil(new Date() / e) * e,
                o = document.createElement("script");
              o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src =
                "https://js.driftt.com/include/" + n + "/" + t + ".js";
              var i = document.getElementsByTagName("script")[0];
              i.parentNode.insertBefore(o, i);
            };
        }
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('krthua7gm9kr');
        console.log('finished loading drift script');
      }

      // End Drift Code
    }

    document.addEventListener("DOMContentLoaded", function(event) {
      if (window.__ace) {
        window.__ace('djcmp', 'executeOnCmpReady', [{
          cb: loadTealiumScript
        }]);
      }
    });
    </script>
    <!-- End CMP Code -->

  </head>

  <body <?php body_class(); ?>>



    <!-- Tealium Data -->
    <div class="site-data always-hide">
      <span id="js-site-home-url"><?php echo get_home_url(); ?></span>
    </div>
    <div id="tealium-page-section">
      <?php
        $pageTitle = get_the_title();
        $siteTitle = get_bloginfo('name');
        echo '<div id="tealium-page-title" style="display:none;">' . $pageTitle . '</div>';
        echo '<div id="tealium-site-title" style="display:none;">' . $siteTitle . '</div>';
        ?>
    </div>


    <script>
    var _page = document.getElementById('tealium-page-title').innerText.trim().toLowerCase(),
      _pageSite = document.getElementById('tealium-site-title').innerText.trim();

    if (_page.toLowerCase() == 'Home'.toLowerCase()) {
      _pageSection = 'WSJ Pro';
      _pageContentType = 'Home';
      _page_site_product = 'WSJPro';

    } else if (_page.toLowerCase() == 'Bankruptcy'.toLowerCase()) {
      _pageSection = 'WSJ Pro - Bankruptcy';
      _pageContentType = 'Summaries';
      _page_site_product = 'WSJProBR';

    } else if ((_page.toLowerCase() == 'Private Equity'.toLowerCase()) || ((window.location.href.indexOf(
          "private-equity") > -
        1))) {
      _pageSection = 'WSJ Pro - Private Equity';
      _pageContentType = 'Summaries';
      _page_site_product = 'WSJProPE';

    } else if (_page.toLowerCase() == 'Venture Capital'.toLowerCase()) {
      _pageSection = 'WSJ Pro - Venture Capital';
      _pageContentType = 'Summaries';
      _page_site_product = 'WSJProVC';


    } else if (_page.toLowerCase() == 'Central Banking'.toLowerCase()) {
      _pageSection = 'WSJ Pro - Central Banking';
      _pageContentType = 'Summaries';
      _page_site_product = 'WSJProCB';
    }

    var utag_data = {
      user_ref: "",
      user_type: "",
      user_tags: "",
      user_exp: "default",
      page_site_product: _page_site_product,
      page_site: "wsjpro",
      page_content_type: "CustomerResource",
      page_content_type_detail: _pageContentType,
      page_content_region: "Global",
      page_content_language: "en-US",
      page_content_source: _page_site_product,
      page_section: _pageSection,
      page_subsection: _pageSection,
      page_id: "procs-home",
      page_access: "free",
      cms_name: "Wordpress",
    }
    </script>







    <header>

      <?php get_template_part( 'modules/navbar' ) ;?>

    </header>