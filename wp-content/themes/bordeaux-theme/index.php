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
<div class="main-div-left col-12 col-sm-8">
<?php
// debug(get_categories());
$couv_posts = get_last_post_cat(10);
$video_posts = get_last_post_cat(3);
$annee_posts = get_last_post_cat(4);
$img =  get_the_post_thumbnail($couv_posts->id);

$actu_args = array(
	"category" => 2,
	"orderby"  => 'date',
	"order"    => 'DESC',
	"posts_per_page"   => 3,
);
$actu_posts = get_posts($actu_args);
// debug($actu_posts);

?>
<section class="couverture">
  <div class="card bg-dark text-white">
    <?= $img ?>
    <div class="card-img-overlay">
  		<div class="">
  			<h5 class="card-title"><?= $couv_posts->title ?></h5>
  			<p class="card-text"><?= $couv_posts->extrait ?></p>
  		</div>
    </div>
  </div>
</section>
<section class="actualite">
	<h2><?= strtoupper(get_category(2)->name) ?></h2>
	<div class="card-container">
		<?php foreach ($actu_posts as $actu_post) :
			// debug($actu_post);
			$img =  get_the_post_thumbnail_url($actu_post->ID);?>
			<div class="card" style="width: 18rem;">
    		<img class="card-img-top" src="<?= $img ?>" alt="Card image cap">
    		<div class="card-body">
      		<h5 class="card-title"><?= $actu_post->post_title ?></h5>
      		<p class="card-text"><?= substr($actu_post->post_content, 0, 140) ?></p>
    		</div>
  		</div>
  	<?php endforeach ?>
	</div>
</section>
<section class="info row">
	<div class="video col-12 col-sm-6" >
		<h2><?= strtoupper(get_category(3)->name) ?></h2>
		<div class="">
			<h3><?php echo $video_posts->title; ?></h3>
			<p><?php echo $video_posts->content; ?></p>
		</div>
	</div>
	<div class="annee col-12 col-sm-6" >
		<h2><?= strtoupper(get_category(4)->name) ?></h2>
		<div class="">
			<h3><?php echo $annee_posts->title; ?></h3>
			<p><?php echo $annee_posts->content; ?></p>
		</div>
	</div>
</section>

</div>
<div class="main-div-right col-12 col-sm-4"><!-- aside -->

</div>
<?php
// get_footer();
