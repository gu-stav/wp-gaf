    <footer>
      <img src="<?php echo get_bloginfo('template_url'); ?>/style/logo.svg"
           class="header__logo"
           alt="GAF Hannover - Logo" />

      <div class="footer__col">
        <?php footer_text(); ?>
      </div>

    </footer>

    <?php wp_footer(); ?>

    <script type="text/javascript"
            src="<?php echo get_template_directory_uri() ?>/js/main-dist.js"></script>
  </body>
</html>
