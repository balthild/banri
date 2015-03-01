<div id="footer">
	<div id="bottomnav">
		<?php if(function_exists('dynamic_sidebar') && is_active_sidebar('footer-widget')) {
			dynamic_sidebar('footer-widget');
		} ?>
	</div>
	<div id="bottom">
		<div id="copyright">
			&copy; 2015 <?php bloginfo('name'); ?>.
			Powered by <a href="http://wordpress.org" target="_blank">Wordpress</a>. Designed by <a href="http://banri.me" target="_blank">Banri</a>. Coded by <a href="http://ires.eu.org" target="_blank">Balthild</a>.
		</div>
		<div id="totop">▲</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>