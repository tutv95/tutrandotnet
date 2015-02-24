<?php $options = get_option('great'); ?>
	</div><!--#page-->
</div><!--.container-->
</div>
	<footer>
		<div class="container">
			<div class="footer-widgets">
               	<div class="copyrights">
					<?php mts_copyrights_credit(); ?>
				</div>
				<div id="ads-link">
					<script src="http://code.hoiquantinhoc.vn/free_host_2/textlinks.js" language="javascript" type="text/javascript"></script>
				</div>
			</div><!--.footer-widgets-->
		</div><!--.container-->
	</footer><!--footer-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/back-top.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sticky-menu.js"></script>

<?php mts_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>