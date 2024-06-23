<?php
$default_cat_id = get_sub_field('category_id');
if($default_cat_id == ''){
	$default_cat_id = 0;
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$year = (get_query_var('year')) ? get_query_var('year') : 0;

$args = array(
	'suppress_filters' => false,
	'post_status' => array('publish'),
	'posts_per_page' => 99999,
	'nopaging' => false,
	'order' => 'DESC',
	'orderby' => 'date',
	'paged' => $paged
);

if($year > 0){
	$args['date_query']['year'] = $year;
}


$page_object = get_queried_object();
$cat_id = $default_cat_id;
if(isset($page_object->cat_name)){
	$cat_id = get_cat_ID($page_object->cat_name);
}

if($cat_id > 0){
	$args['category'] = $cat_id;
}

$news = get_posts( $args );

$wp_post_categories = get_categories();
$counter = 0; 

$text = get_sub_field('text');
$page_id = get_queried_object_id();
?>

<div class="block-blog">
   <div class="blog-text">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <div class="text">
                        <?php if($text != ''): ?>
                        <?php echo $text;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   <div class="blog-archives">
       <div class="wrapper">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">
					   <div class="archive-anchors">
						<?php
						$archive_urls_args = [
							'type' => 'yearly',
							'echo' => 0
						];
						if($cat_id > 0){
							$archive_urls_args['cat'] = $cat_id;
						}

						// $archive_urls_args['cat'] = 19; // category selection returns 4 for uncategorized category, although its ID is 1

						add_filter( 'get_archives_link', function( $html ) 
						{
							$page_id = get_queried_object_id();
							if( is_admin() ) // Just in case, don't run on admin side
								return $html;

							// $html is '<li><a href='http://example.com/hello-world'>Hello world!</a></li>'

							$html = str_replace(['http'.($_SERVER['HTTPS'] ? 's' : '').'://'.$_SERVER['HTTP_HOST'].'/'.(ICL_LANGUAGE_CODE != 'de' ? 'en/' : ''),'/\''],[get_permalink( $page_id ).'?year=','\''],$html);
							return $html;
						});
						$archive_html = wp_get_archives($archive_urls_args);
						if($archive_html != ''){
							echo '<ul><li><a href="'.get_permalink( $page_id ).'" class="active">'.__('All the news','opernturm').'</a></li>'.$archive_html.'</ul>';
						}
						// get_option( 'page_for_posts' ) 
						$archive_urls_args['format'] = 'option';
						$archive_html = wp_get_archives($archive_urls_args);
						if($archive_html != ''){
							echo '<select name="archive"><option value="'.get_permalink( $page_id ).'">'.__('All the news','opernturm').''.$archive_html.'</select>';
						}

						?>
						</div>
                   </div>
               </div>
           </div>
       </div>
   </div>
    <div class="block-actuelles blog-cards">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row blog-cards-wrapper">
				<?php
				$max_count = 12;
				$count_news = count($news);
				$counter = 0;
				foreach($news as $post ):
					$author_id = $post->post_author;
					$excerpt = $post->post_excerpt;
					$timestamp = strtotime($post->post_date);
					$title = get_sub_field('title');
					$reading_time = get_sub_field('reading_time', $post->ID);
					$author = get_author_name($post->post_author);
					$author_country = get_field('author_country', $post->ID);
					$reading_time = get_field('reading_time', $post->ID);
					$size = get_field('teaser_size', $post->ID);
				?>

                    <div class="col-12 col-md-6 col-lg-6 card-wrapper<?php echo ($count_news > $max_count && $counter >= ($max_count-2) ? ' hide' : '') ?>">
                        <div class="cards">
                            <a class="card-link" href="<?php the_permalink($post->ID); ?>">
                                <?php if(get_the_post_thumbnail($post->ID)):?>
                                <div class="img-wrapper">
                                    <?php echo get_the_post_thumbnail($post->ID); ?>

                                </div>
                                <?php endif; ?>
                                <div class="card-text">

                                    <p class="date"><?php echo __(date('F', $timestamp),'opernturm').' '.date('Y', $timestamp); ?></p>
                                    <div class="text">
                                        <h3><?php echo get_the_title($post->ID); ?></h3>
                                    </div>
                                    <div class="button">
                                        <p class="link-artikel"><?php echo __('read full article', 'opernturm'); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
					$counter++;
					endforeach;
					?>
                </div>
				<?php
				if($count_news > $max_count){
					echo '<div class="row load-more-wrapper"><div class="col-12"><div class="load-more"><a href="#" class="load">'.__('Load more','opernturm').'</a></div></div></div>';
				}
				?>
            </div>
        </div>
    </div>
</div>