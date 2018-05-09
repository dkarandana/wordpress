<?php

	$galleryArgs = array(
		'category_name' => 'home-gallery'
	);

	$galleryTabs = get_posts( $galleryArgs );

	$galleryData = array();

	/* Store Data in a associated Array */

	foreach ( $galleryTabs  as $galleryTab ) {

		$tabId = $galleryTab->ID;
		$tabLabel =  $galleryTab->post_title;

		$tabimages = get_field_object( 'collection' , $tabId );

		if( array_key_exists('value', $tabimages ) ){

			$galleryData[$tabId]['title'] = $tabLabel;

			foreach ( $tabimages['value'] as $image ) {

				$galleryData[$tabId]['images'][] = array(
					"fileHREF"=>$image["url"],
					"fileHeight"=>$image["height"],
					"fileWidth"=>$image["width"],
					"fileName"=>$image["filename"],
					"fileAlt"=>$image["alt"],
					"thumbs"=>$image["sizes"]
				);
			}
		}
	}

$galleryTpl = "";

foreach ($galleryData as $galleryTab) {

	$galleryTpl .= "<h4 class='gallery-tab'>" .$galleryTab["title"] . "</h4>";

	foreach( $galleryTab['images'] as $image ){
		$galleryTpl .= <<<THUMB
		<a href="{$image["fileHREF"]}">
			<img src="{$image["thumbs"]["thumbnail"]}" alt="{$image["fileAlt"]}" height="{$image["thumbs"]["thumbnail-height"]}" width="{$image["thumbs"]["thumbnail-width"]}"/>
		</a>
THUMB;
	}
}

echo $galleryTpl;

?>