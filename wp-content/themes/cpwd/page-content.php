

<div class="___mdc-layout-grid">
  <div class="mdc-layout-grid__inner">
  	 <header class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

        Header
    </header>

    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
    	
    	<div class="mdc-layout-grid__inner">
    		<div class="block__latest__news mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
    			<div class="mdc-layout-grid__inner">
    				<?php include "news-feed.php";?>
    			</div>
    		</div>
    		<div class="block__latest__events mdc-layout-grid__cell mdc-layout-grid__cell--span-12">	
                Events
    		</div>
    	</div>
  
    </div>
    <footer class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">

        Footer
    </footer>
  </div>
</div>

<!-- <section class="content auth-profiles">
	<?php include "auth-profiles.php";?>
</section>
<section class="image-sub-gallery">
	<?php include "image-sub-gallery.php";?>
</section>
 -->
<?php bloginfo('rss_url'); ?>