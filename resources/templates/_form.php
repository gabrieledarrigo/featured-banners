<p>
    <div class="widget-content">
        <label for="<?php echo esc_attr($fields['banner_uri']['id']); ?>">
            Link del banner
        </label>

        <input class="widefat" id="<?php echo esc_attr($fields['banner_uri']['id']); ?>"
               name="<?php echo esc_attr($fields['banner_uri']['name']); ?>" type="text"
               value="<?php echo esc_attr($instance['banner_uri']); ?>"/>
    </div>

    <br/>

    <div class="widget-content">
        <input class="widefat" id="<?php echo esc_attr($fields['banner_image']['id']); ?>"
               name="<?php echo esc_attr($fields['banner_image']['name']); ?>" type="text"
               value="<?php echo esc_attr($instance['banner_image']); ?>"/>

        <br/>
        <br/>

        <input type="button" class="button button-primary" value="Carica un'immagine"
                data-feature-banners-upload
                data-target="#<?php echo esc_attr($fields['banner_image']['id']); ?>" />

        <br/>
        <br/>

        <div class="image-placeholder">
            <?php if (isset($instance['banner_image'])): ?>
                <img src="<?php echo esc_attr($instance['banner_image']); ?>" class="image-picture" class="image-placeholder" height="120" width="120" title="Anteprima" alt="Anteprima" />
            <?php else: ?>
                <img src="" class="image-picture" height="120" width="120" title="Anteprima" alt="Anteprima" />
            <?php endif; ?>
        </div>
    </div>
</p>