<?php
/**
 * settings not changeable by theme options
 */

$layout=array();

//the widget area must use classes
$widget_area=array(
	'title_class'=>'ui-widget-header ui-corner-all',
	'body_class'=>'',
	);

//the meta to show or hide in the frontpage
$meta=array(
	'commentcount'=>'Show Comment Count',
	'left'=>array('Show in the Left','category'=>'Category','date'=>'Publish Date','author'=>'Author Name without Link','author_posts'=>'Author Name with link to thir posts','author_link'=>'Author Name with link to thir website'),
	'right'=>array('Show in the Right','category'=>'Category','date'=>'Publish Date','author'=>'Author Name without Link','author_posts'=>'Author Name with link to thir posts','author_link'=>'Author Name with link to thir website')
	);

//the css styles
$style=array(
	'woods'=>'Woods',
	'sea'=>'Sea',
	'forest'=>'Forest',
	'sky'=>'Happy Sky',
	'urban'=>'Urban',
	);

//variables
$vars=array(
	'data'=>'<a href="http://themes.itx.web.id/bombax/"><strong>Bombax Theme</strong> designed by <strong>itx</itx></a></div></div></div></div>',
	);

//stock images for header background
$head_bg=array(
	'Valley' => array(
		'url' => '%s/images/oya-valley.jpg',
		'thumbnail_url' => '%s/images/oya-valley-thumb.jpg',
		'description' => __('Oya River Valley (1600x485)', 'Bombax')
	),
	'Sand' => array(
		'url' => '%s/images/timang-sand.jpg',
		'thumbnail_url' => '%s/images/timang-sand-thumb.jpg',
		'description' => __('Timang Beach Sand (1600x392), the default header of Bombax', 'Bombax')
	),
	'Bush' => array(
		'url' => '%s/images/tea-bush.jpg',
		'thumbnail_url' => '%s/images/tea-bush-thumb.jpg',
		'description' => __('Sundoro Tea Bush (1600x295)', 'Bombax')
	),
);

?>
