<?php if (!empty($banner->getImage())) :?>
    <div class="featured-banners">
        <?php if (!empty($banner->getUri())) : ?>
            <a href="<?php echo esc_attr($banner->getUri()); ?>" title="Banner">
                <img src="<?php echo esc_attr($banner->getImage()); ?>" class="featured-banners-image"/>
            </a>
        <?php else : ?>
            <img src="<?php echo esc_attr($banner->getImage()); ?>" class="featured-banners-image"/>
        <?php endif; ?>
    </div>
<?php endif; ?>
