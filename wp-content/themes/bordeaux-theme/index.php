<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bordeaux-theme
 */

get_header();
?>
<div class="col-12 col-sm-8" style="min-height:500px;background-color:red;">
<?php
$args = array(
	"category" => 10,
	"orderby"  => 'date',
	"order"    => 'DESC',
	"posts_per_page"   => 1,
);
$posts = get_posts($args);
$post = $posts[0];
$ID = $post->ID;
$img =  get_the_post_thumbnail($ID);
$title = $post->post_title;
$content = $post->post_content;
$extrait = substr($content, 0, 150);
?>

<div class="card bg-dark text-white">
  <?= $img ?>
  <div class="card-img-overlay">
    <h5 class="card-title"><?= $title ?></h5>
    <p class="card-text"><?= $extrait ?></p>
  </div>
</div>

</div>
<div class="col-12 col-sm-4" style="min-height:500px;background-color:blue;">

</div>
<?php
// get_footer();
