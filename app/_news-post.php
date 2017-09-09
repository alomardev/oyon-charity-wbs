<?php
if (isImage($post['header_image'])) {
echo "<div class='post-header-image' style='background-image: url($post[header_image]);'></div>";
}
$url = "http://oyon.org.sa/show.php?p=$post[id]";
?>
<div class="post-title"><h2><?php echo $post['title']; ?></h2><span class="date"><bdo dir="ltr"><?php echo $post['date']; ?></bdo></span></div>
<article class="post-content"><?php echo $post['content']; ?></article>
<div class="post-footer actions-container u-cf">
	<a target="_blank" href="whatsapp://send?text=<?php echo $url; ?>" class="u-fl icon-share-whatsapp"></a>
	<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $url; ?>" class="u-fl icon-share-twitter"></a>
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" class="u-fl icon-share-facebook"></a>
	<a target="_blank" href="https://plus.google.com/share?url=<?php echo $url; ?>" class="u-fl icon-share-googleplus"></a>
	<div class="u-fr"><small>الزيارات: <?php echo $post['visits']; ?></small></div>
</div>