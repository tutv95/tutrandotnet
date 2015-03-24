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
			</div><!--.footer-widgets-->
		</div><!--.container-->
	</footer><!--footer-->

<!-- Js -->
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/customscript.js" type="text/javascript"></script>
<?php mts_footer(); ?>
<?php wp_footer(); ?>
<script type="text/javascript">
<?php if (is_single()) echo "countSocial(\"". get_permalink() ."\");";?>
</script>
</body>
</html>