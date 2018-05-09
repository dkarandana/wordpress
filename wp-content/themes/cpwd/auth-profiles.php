<?php
	$PROFILE_SLUG = 'php-author-profiles';
	$args = array(
		'posts_per_page'   => 3,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => $PROFILE_SLUG,
		'orderby'          => 'date',
		'order'            => 'ASC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
$profiles = get_posts( $args );

$slugData = get_category_by_slug( $PROFILE_SLUG );

echo "<h2>{$slugData->name}</h2>";


function urlEntry( $profileData ){

	$value = $profileData['value'];
	$label = $profileData['label'];

	$value = ( $value != null ) ? "<li>$label <a href='$value'>$value</a></li>": false;

	return $value;
}

foreach ($profiles as $profile):

	$profileId = $profile->ID;

/* How to use ACF for fetch given post */

	$linkeidProfile = urlEntry( get_field_object( 'linkedin', $profileId ) );
	$twitterProfile = urlEntry( get_field_object( 'twitter', $profileId ) );

echo <<<PROF
	
PROF;

if ( has_post_thumbnail( $profileId ) ) {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id( $profileId ), array( 160,160 ), false, '' );
	$cls = 'profile-pic';
	$profileH3 ="h3 style='background-image:url($src[0])'";
}else{
	$profileH3 ="h3";
	$cls = 'no-profile-pic';
}
echo <<<PROF
	<section class="$cls">
			<$profileH3>{$profile->post_title}</h3>
			<p>{$profile->post_content}</p>
			<ul>
				$linkeidProfile
				$twitterProfile
			</ul>
	</section>
PROF;

endforeach;

?>