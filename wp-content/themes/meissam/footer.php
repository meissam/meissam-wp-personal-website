<footer class="footer">
    <div class="wrapper clearfix">

        <div id="copyright">
          <p>made by  <a href="#">@meissam</a></p>
        </div>

        <ul id="social-links">
            <li><a href="https://www.linkedin.com/in/meissam-rasouli/"><i class="icon-linkedin"></i></a></li>
            <li> <a href="https://github.com/meissam"><i class="icon-github"></i></a></li>
            <li><a href="<?php echo home_url( $path = 'tags', $scheme = 'relative' ); ?>"><i class="icon-hash"></i></a></li>
            <li> <a href="<?php echo home_url( $path = 'feed', $scheme = 'relative' ); ?>"><i class="icon-rss"></i></a></li>
        </ul>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>