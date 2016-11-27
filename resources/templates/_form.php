<div class="widget-content">
    <label for="<?php echo esc_attr($fields->get('banner_uri')->getId()); ?>">
        Link del banner
    </label>

    <input class="widefat" id="<?php echo esc_attr($fields->get('banner_uri')->getId()); ?>"
           name="<?php echo esc_attr($fields->get('banner_uri')->getName()); ?>" type="text"
           value="<?php echo esc_attr($banner->getUri()); ?>"/>
</div>

<br/>

<div class="widget-content">
    <input class="widefat" id="<?php echo esc_attr($fields->get('banner_image')->getId()); ?>"
           name="<?php echo esc_attr($fields->get('banner_image')->getName()); ?>" type="text"
           value="<?php echo esc_attr($banner->getImage()); ?>"/>

    <br/>
    <br/>

    <input type="button" class="button button-primary" value="Carica un'immagine"
           data-featured-banners-upload
           data-target="#<?php echo esc_attr($fields->get('banner_image')->getId()); ?>"/>

    <br/>
    <br/>

    <div class="image-placeholder">
        <?php if (!empty($banner->getImage())): ?>
            <img src="<?php echo esc_attr($banner->getImage()); ?>" class="image-picture" class="image-placeholder"
                 height="120" width="120" title="Anteprima" alt="Anteprima"/>
        <?php else: ?>
            <img src="" class="image-picture" height="120" width="120" title="Anteprima" alt="Anteprima"/>
        <?php endif; ?>
    </div>
</div>