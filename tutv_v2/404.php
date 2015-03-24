<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<div id="content" class="hfeed">
					<header>
						<div class="title">
							<h1><?php _e('Trang này không tồn tại', 'mythemeshop'); ?></h1>
						</div>
					</header>
					<div class="post-content">
						<p>Ồ. Có vẻ như link này không tồn tại hoặc đã bị xoá bởi quản trị viên.</p>
						<p>Bạn thử kiểm tra lại xem hoặc có thể tìm kiếm ở bên dưới đây thử xem :]</p>
						<?php include("ggsearch.php");?>
					</div><!--.post-content--><!--#error404 .post-->
				</div><!--#content-->
			</div><!--#content_box-->
		</article>
<?php get_footer(); ?>