<?php
error_reporting(0);
if (isImage($post['header_image'])) {
echo "<div class='post-header-image' style='background-image: url($post[header_image]);'></div>";
}
?>
<div class="post-title"><h2><?php echo $post['title']; ?></h2><span class="date"><bdo dir="ltr"><?php echo $post['date']; ?></bdo></span></div>
<div class="post-content"><?php echo htmlspecialchars_decode($post['content']); ?></div>