
<?php

  $NEWS_FEED_SLUG = 'news';
  
  $args = array(
    'posts_per_page'   => 3,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => $NEWS_FEED_SLUG,
    'orderby'          => 'date',
    'order'            => 'ASC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'post',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'     => '',
    'post_status'      => 'publish',
    'suppress_filters' => true 
  );
  
  $newsFeed = get_posts( $args );
  $newsCategory = get_category_by_slug( $NEWS_FEED_SLUG );

  echo <<<EOD
  <h3>{$newsCategory->name}</h3>
EOD;

$newsCard = "";
foreach ($newsFeed as $news) {

  $news_ID = $news->ID;
  $news_title = $news->post_title;
  $news_content = $news->post_content;
  $news_date = $news->post_date;
  $news_guid = $news->guid;
  
/*  echo <<<EOD
  <li class="post_id_{$news_ID}">
    <h4>{$news_title}</h4>
    <p>{$news_content}</p>
  <a href="{$news_guid}">Read more</a>
  </li>
EOD;*/

  $newsCard .= <<<EOD

<div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
  <div class="mdc-card">
    <div class="demo-card__primary">
      <h2 class="demo-card__title mdc-typography--headline6">{$news_title}</h2>
      <h3 class="demo-card__subtitle mdc-typography--subtitle2">
        <a href="{$news_guid}">Read more</a>
      </h3>
    </div>

    <div class="demo-card__secondary mdc-typography--body2">
      {$news_content}
    </div>

    <!-- ... content ... -->
    <div class="mdc-card__actions">
      <div class="mdc-card__action-icons">
        <i class="material-icons mdc-card__action mdc-card__action--icon" tabindex="0" role="button" title="Share">share</i>
       <!-- <i class="material-icons mdc-card__action mdc-card__action--icon" tabindex="0" role="button" title="More options">more_vert</i>-->
      </div>
    </div>
  </div>
</div>
EOD;

}

echo $newsCard;

?>




