<?php
add_action('add_meta_boxes', 'add_social_links_metabox');


function add_social_links_metabox(){
    add_meta_box('social-links', __('Social Links', 'cdiptheme'), 'add_social_links_metabox_callback');
}

function add_social_links_metabox_callback(){
   ?>
    <div class="form-group">
        <label for="facebook_link" style="clear: both;width: 100%;">Facebook Link</label>
        <?php
            $facebook_link = get_post_meta(get_the_ID(),'facebook_link', true);
        ?>
        <input type="text" name="facebook_link" style="clear: both;width: 100%;" value="<?php echo $facebook_link?$facebook_link:'';?>">
    </div>
    <div class="form-group">
        <label for="twitter_link" style="clear: both;width: 100%;">Twitter Link</label>
        <input type="text" name="twitter_link" style="clear: both;width: 100%;">
    </div>
    <?php
}


add_action('save_post', 'save_social_links');


function save_social_links($post_id){
    if(isset($_POST['facebook_link'])){
        update_post_meta($post_id, 'facebook_link', esc_attr($_POST['facebook_link']));
    }else{
        delete_post_meta($post_id, 'facebook_link');
    }


}