<?php
/**
 * The Footer template
 *
 * Displays all of the footer-content section to end tag of html.
 *
 * @package WSJ EVENT TEMPLATE
 */

?>

<?php
        $footer_links = get_field('footer_links', get_option( 'page_on_front' ) );
        $footer_cta = get_field('footer_cta', get_option( 'page_on_front' ));
        $mailto_subject = get_field('mailto_subject', get_option( 'page_on_front' ));
           $nav_logo = get_field('nav_logo');
        ?>





<footer class="footer">

  <!-- logo -->
  <figure class="footer__logo">
    <a id="<?php echo wsj_link_id( 'footer logo', 'home' ); ?>" href="<?php echo get_home_url(); ?>">
      <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/dist/img/logo-footer.svg" alt="WSJ Pro Logo"
        title="WSJ Pro" width="100%">
    </a>
  </figure>


  <!-- links -->
  <section class="footer__legal">
    <p class="footer__copyright">&copy; Copyright
      <script type="text/javascript">
      document.write(new Date().getFullYear());
      </script>
      Dow Jones &amp; Company, Inc. All Rights Reserved.
    </p>
    <p class="footer__notices">
      <?php foreach ($footer_links as $link): ?>
      <a class="footer__link" id="home-footer-legal-www-dowjones-com" href="<?php echo $link['links']['url']?>"
        target="_target" rel="noopener">
        <?php echo $link['links']['title']?> </a>
      <?php endforeach; ?>
      <!-- Regulation Links -->
      <a id="regulation-links" class="footer__regulation-links" href="#" target="_self"></a>
    </p>
  </section>
</footer>

<?php wp_footer(); ?>

<!-- Regulation Links -->
<script>
__ace('djcmp', 'getRegulationLinkRenderer', (RegulationLink) => {
  const linkConfigurations = __ace('djcmp', 'getRegulationLinkConfigurations');
  new RegulationLink(linkConfigurations).render();
});
</script>

<script async src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" rel="preload"></script>


</body>

</html>