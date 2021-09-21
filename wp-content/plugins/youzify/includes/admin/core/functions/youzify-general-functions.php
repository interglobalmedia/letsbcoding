<?php

/**
 * Disable Gravatars
 */
add_filter( 'bp_core_fetch_avatar_no_grav', '__return_true' );

/**
 * Check Is Youzify Panel Page.
 */
function is_youzify_panel_page( $page_name ) {

    // Is Panel.
    $is_panel = isset( $_GET['page'] ) && $_GET['page'] == $page_name ? true : false;

    return apply_filters( 'is_youzify_panel_page', $is_panel, $page_name );
}

/**
 * Check Is Youzify Panel Page.
 */
function is_youzify_panel_tab( $tab_name ) {

    // Is Panel.
    $is_tab = isset( $_GET['tab'] ) && $_GET['tab'] == $tab_name ? true : false;

    return apply_filters( 'is_youzify_panel_tab', $is_tab, $tab_name );
}

/**
 * Admin Youzify Icon Css
 */
function youzify_admin_bar_icon_css() { ?>
    <style>
        #adminmenu .toplevel_page_youzify-panel img {
            padding-top: 3px !important;
        }
    </style>
    <?php
}

add_action( 'admin_head', 'youzify_admin_bar_icon_css' );

/**
 * Check if page is an admin page  tab
 */
function youzify_is_panel_tab( $page_name, $tab_name ) {

    if ( is_admin() && isset( $_GET['page'] ) && isset( $_GET['tab'] ) && $_GET['page'] == $page_name && $_GET['tab'] == $tab_name ) {
        return true;
    }

    return false;
}


/**
 * Get Panel Profile Fields.
 */
function youzify_get_panel_profile_fields() {

    // Init Panel Fields.
    $panel_fields = array();

    // Get All Fields.
    $all_fields = youzify_get_all_profile_fields();

    foreach ( $all_fields as $field ) {

        // Get ID.
        $field_id = $field['id'];

        // Add Data.
        $panel_fields[ $field_id ] = $field['name'];

    }

    // Add User Login Option Data.
    $panel_fields['user_login'] = __( 'Username', 'youzify' );

    return $panel_fields;
}

/**
 * Get Panel Profile Fields.
 */
function youzify_get_user_tags_xprofile_fields() {

    // Init Panel Fields.
    $xprofile_fields = array();

    // Get xprofile Fields.
    $fields = youzify_get_bp_profile_fields();

    foreach ( $fields as $field ) {

        // Get ID.
        $field_id = $field['id'];

        // Add Data.
        $xprofile_fields[ $field_id ] = $field['name'];

    }

    return $xprofile_fields;
}

/**
 * Get Activity Posts Types
 */
function youzify_activity_post_types() {

    // Get Post Types Visibility
    $post_types = array(
        'activity_status'       => __( 'Status', 'youzify' ),
        'activity_photo'        => __( 'Photo', 'youzify' ),
        'activity_slideshow'    => __( 'Slideshow', 'youzify' ),
        'activity_link'         => __( 'Link', 'youzify' ),
        'activity_quote'        => __( 'Quote', 'youzify' ),
        'activity_giphy'        => __( 'GIF', 'youzify' ),
        'activity_video'        => __( 'Video', 'youzify' ),
        'activity_audio'        => __( 'Audio', 'youzify' ),
        'activity_file'         => __( 'File', 'youzify' ),
        'activity_poll'         => __( 'Poll', 'youzify' ),
        'activity_share'        => __( 'Share', 'youzify' ),
        'new_cover'             => __( 'New Cover', 'youzify' ),
        'new_avatar'            => __( 'New Avatar', 'youzify' ),
        'new_member'            => __( 'New Member', 'youzify' ),
        'friendship_created'    => __( 'Friendship Created', 'youzify' ),
        'friendship_accepted'   => __( 'Friendship Accepted', 'youzify' ),
        'created_group'         => __( 'Group Created', 'youzify' ),
        'joined_group'          => __( 'Group Joined', 'youzify' ),
        'new_blog_post'         => __( 'New Blog Post', 'youzify' ),
        'new_blog_comment'      => __( 'New Blog Comment', 'youzify' ),
        // 'activity_comment'      => __( 'Comment Post', 'youzify' ),
        'updated_profile'       => __( 'Updates Profile', 'youzify' )
    );

    if ( class_exists( 'WooCommerce' ) ) {
        $post_types['new_wc_product'] = __( 'New Product', 'youzify' );
        $post_types['new_wc_purchase'] = __( 'New Purchase', 'youzify' );
    }

    if ( class_exists( 'bbPress' ) ) {
        $post_types['bbp_topic_create'] = __( 'Forum Topic', 'youzify' );
        $post_types['bbp_reply_create'] = __( 'Forum Reply', 'youzify' );
    }

    return apply_filters( 'youzify_activity_post_types', $post_types );
}

/**
 * Admin Modal Form
 */
function youzify_panel_modal_form( $args, $modal_function ) {

    $button_title = isset( $args['button_title'] ) ? $args['button_title'] : __( 'Save', 'youzify' );

    ?>

    <div class="youzify-md-modal youzify-md-effect-1" id="<?php echo $args['id'] ;?>">
        <h3 class="youzify-md-title" data-title="<?php echo $args['title']; ?>"><?php echo $args['title']; ?><i class="fas fa-times youzify-md-close-icon"></i></h3>
        <div class="youzify-md-content"><?php $modal_function(); ?></div>
        <div class="youzify-md-actions">
            <button id="<?php echo $args['button_id']; ?>" data-add="<?php echo $args['button_id']; ?>" class="youzify-md-button youzify-md-save"><?php echo $button_title ?></button>
            <button class="youzify-md-button youzify-md-close"><?php _e( 'Close', 'youzify' ); ?></button>
        </div>
    </div>

    <?php
}

/**
 * Exclude Youzify Media from Wordpress Media Library.
 */
add_filter( 'parse_query', 'youzify_exclude_youzify_media_from_media_library' );

function youzify_exclude_youzify_media_from_media_library( $wp_query ) {

    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false ) {
        $term = get_term_by( 'slug', 'youzify_media', 'category' );
        if ( isset( $term->term_id ) ) {
            $wp_query->set( 'category__not_in', array( $term->term_id ) );
        }
    }

}

/**
 * Check if feature is available
 */
function youzify_is_feature_available() {
    return apply_filters( 'youzify_is_feature_available', false );
}

/**
 * Get Features Tag.
 */
function youzify_get_premium_tag() {
    return '<div class="youzify-premium-tag"><i class="fas fa-gem"></i>' . __( 'Premium', 'youzify' ) . '</div>';
}

/**
 * Get User Statistics Options.
 */
function youzify_get_user_statistics_options() {

    $statistics = array(
        'posts'     => __( 'Posts', 'youzify' ),
        'comments'  => __( 'Comments', 'youzify' ),
        'views'     => __( 'Views', 'youzify' ),
        'ratings'   => __( 'Ratings', 'youzify' ),
        'followers' => __( 'Followers', 'youzify' ),
        'following' => __( 'Following', 'youzify' ),
        'points'    => __( 'Points', 'youzify' )
    );

    return apply_filters( 'youzify_get_user_statistics_options', $statistics );

}

/**
 * Special Offer
 **/
add_action( 'youzify_admin_before_form', 'youzify_special_offer' );

function youzify_special_offer() {

    $id = 'youzify_7day_aap_offer_3';

    if ( isset( $_GET['youzify-dismiss-offer-notice'] ) ) {
        youzify_update_option( $_GET['youzify-dismiss-offer-notice'], 1 );
    }

    if ( strtotime( '2021/09/19') < strtotime( 'now' ) || youzify_option( $id ) ) {
        return;
    }

    $price = array(
        'currency' => '$',
        'per' => 'year',
    );

    $boxes = array(
        'first' => array(
            'theme' => 'black',
            'title' => 'All-Access Pass <span class="yzp-highlught">1 Year</span>',
            'price' => 199,
            'normally' => 299,
            'save' => array(
                'price' => '99',
                'percent' => 33
            ),
            'benefits' => array(
                '1 Site License',
                'Access all Youzify Add-Ons',
                'Free Access to all Upcoming Addons',
                'Unlimited Support and Updates',
            ),
            'bonus' => array(
                '30% OFF on Renewals',
                'Access +700 Youzify Snippets',
            ),
            'link' => 'https://youzify.com/checkout?edd_action=add_to_cart&download_id=80728&edd_options[price_id]=7&utm_campaign=youzify-' . YOUZIFY_VERSION . '-offer&utm_medium=offer&utm_source=client-site&utm_content=plan-1year',
            'cta' => 'Choose Plan'
        ),
        'second' => array(
            'theme' => 'black',
            'title' => 'All-Access Pass <span class="yzp-highlught">2 Years</span>',
            'price' => 149,
            'normally' => 299,
            'save' => array(
                'price' => 300,
                'percent' => 50
            ),
            'benefits' => array(
                '1 Site License',
                'Access all Youzify Add-Ons',
                'Free Access to all Upcoming Addons',
                'Unlimited Support and Updates',
            ),
            'bonus' => array(
                '30% OFF on Renewals',
                'Access +700 Youzify Snippets',
            ),
            'link' => 'https://youzify.com/checkout?edd_action=add_to_cart&download_id=80728&edd_options[price_id]=5&utm_campaign=youzify-' . YOUZIFY_VERSION . '-offer&utm_medium=offer&utm_source=client-site&utm_content=plan-2years',
            'cta' => 'Choose Plan'
        ),
        'third' => array(
            'theme' => 'white',
            'tag' => 'Best Value',
            'title' => 'All-Access Pass <span class="yzp-highlught">5 Years</span>',
            'price' => 99,
            'normally' => 299,
            'save' => array(
                'price' => '1000',
                'percent' => 77
            ),
            'benefits' => array(
                'Access all Youzify Add-Ons',
                'Free Access to all Upcoming Addons',
                'Unlimited Support and Updates',
            ),
            'bonus' => array(
                '5 Sites License ( Value: $399/Year )',
                '50% OFF on Renewals',
                'Access +700 Youzify Snippets ',
                '1-Year Youzify Pro FREE Support',
            ),
            'link' => 'https://youzify.com/checkout?edd_action=add_to_cart&download_id=80728&edd_options[price_id]=6&utm_campaign=youzify-' . YOUZIFY_VERSION . '-offer&utm_medium=offer&utm_source=client-site&utm_content=plan-5years',
            'cta' => 'Choose Plan'
        )
    );



    ?>
    <style type="text/css">

        .yzp-offer {
            margin: 50px 35px;
        }

        .yzp-table {
            gap: 35px;
            width: 100%;
            display: inline-flex;
        }

        .yzp-box {
            position: relative;
            display: flex;
            padding: 35px;
            width: 33.33%;
            border-radius: 8px;
            flex-direction: column;
        }

        span.yzp-currency {
            /*color: #eee;*/
            font-size: 26px;
            margin-top: -5px;
            vertical-align: top;
            display: inline-block;
        }

        .yzp-black-theme span.yzp-currency {
            color: #000;
        }

        .yzp-white-theme span.yzp-currency {
            color: #fff;
        }

        .yzp-price {
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
        }

        span.yzp-separator {
            font-size: 18px;
            color: #eee;
        }

        .yzp-black-theme span.yzp-separator {
            color: #000;
        }

        .yzp-white-theme span.yzp-separator {
            color: #fff;
        }

        .yzp-black-theme span.yzp-price-label {
            color: #000;
            font-weight: 600;
        }

        .yzp-white-theme span.yzp-price-label {
            color: #eee;
        }

        span.yzp-per {
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
        }

        span.yzp-amount {
            font-size: 50px;
            font-weight: 600;
        }


        a.yzp-cta-button {
            background: #fff;
            display: block;
            text-align: center;
            height: 55px;
            border-radius: 5px;
            line-height: 55px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: #555;
        }

        a.yzp-cta-button i {
            margin-left: 12px;
        }

        .yzp-box-pricing {
            display: flex;
            align-items: center;
        }

        .yzp-box-head {
            margin-bottom: 25px;
        }

        .yzp-normally {
            margin-left: auto;
        }

        .yzp-normally span.yzp-amount {
            font-weight: 400;
            text-decoration: line-through;
        }

        .yzp-price-label {
            display: block;
            margin-bottom: 12px;
        }

        .yzp-box-title {
            display: block;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            padding: 25px 0;
            line-height: 28px;
            font-family: Open sans,sans-serif;
        }

        .yzp-save {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 18px;
            padding: 5px 15px;
            border-radius: 50px;
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        span.yzp-save-price {
            display: inline-block;
            background: #fff952;
            color: #000;
            padding: 14px 13px;
            border-radius: 50px;
            margin-left: 5px;
            font-size: 20px;
            line-height: 0px;
        }

        span.yzp-save-percent {
            /*color: #fff952;*/
            font-size: 30px;
        }

        .yzp-box-bonus {
            font-size: 14px;
            line-height: 24px;
            margin-bottom: 12px;
            border-radius: 5px;
            padding: 8px 15px;
        }


        .yzp-white-theme .yzp-box-bonus {
            /*background: rgb(255 255 255 / 10%);*/
            background: #fff;
            color: #000;
            font-weight: 600;
        }
9
        .yzp-black-theme .yzp-box-bonus {
            color: #000;
            font-weight: 600;
            background: rgb(255 255 255 / 10%);
        }

        .yzp-box-benefit {
            font-size: 14px;
            line-height: 18px;
            margin-bottom: 15px;
        }

        .yzp-box-benefit i {
            margin-right: 10px;
        }

        span.yzp-bonus-tag {
            color: #000;
            text-transform: uppercase;
            background: yellow;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 4px;
            margin-right: 13px;
        }

        .yzp-bonuses-title,
        .yzp-benefits-title {
            font-weight: 600;
            /*text-align: center;*/
            margin-bottom: 20px;
        }

        .yzp-box-benefits {
            margin-bottom: 25px;
        }

        .yzp-black-theme .yzp-bonuses-title {
            color: #000;
        }

        .yzp-white-theme .yzp-bonuses-title {
            color: #fff952;
        }

        .yzp-box-content {
            padding: 35px 0;
        }

        .yzp-box-footer {
            margin-top: auto;
        }

        .yzp-aap-content {
            background: #fff;
            padding: 35px;
            border-radius: 8px;
            margin-bottom: 35px;
        }

        .yzp-first-box {
            background: #fff;
        }

        .yzp-second-box {
            background: #f3eb90;
        }

        .yzp-third-box {
            background: #000;
        }

        .yzp-first-box a.yzp-cta-button {
            background: #eee;
            color: #000;
        }

        .yzp-second-box a.yzp-cta-button {
            background: #fff;
            color: #000;
        }

        .yzp-third-box a.yzp-cta-button {
            background: #ff0;
            color: #000;
        }

        .yzp-first-box .yzp-box-bonus {
            background: #f0f0f1;
        }

        .yzp-second-box .yzp-box-bonus  {
            background: #0000001a;
        }

        .yzp-white-theme {
            color: #fff;
        }

        .yzp-black-theme {
            color: #000;
        }

        .yzp-aap-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .yzp-aap-title i {
            margin-right: 8px;
        }

        .yzp-aap-addons {
            display: flex;
            flex-wrap: wrap;
        }

        .yzp-addon {
            width: 32%;
            margin-bottom: 18px;
            display: flex;
            font-weight: 600;
            margin-right: 15px;
            align-items: center;
                flex-grow: 1;
        }

        .yzp-addon i {
            margin-right: 6px;
        }

        .yzp-aap-value {
            font-weight: 600;
            color: rgb(228, 59, 44);
            margin-left: 12px;
        }

        .yzp-total-value {
            width: 300px;
            display: block;
            margin: 25px auto 0;
            background: #f44336;
            height: 65px;
            line-height: 65px;
            text-align: center;
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            border-radius: 5px;
        }

        .yzp-aap-note {
            display: block;
            color: #898989;
            font-size: 13px;
            line-height: 22px;
            text-align: center;
            margin-top: 20px;
        }

        .yzp-renewal-notice {
            display: block;
            font-size: 13px;
            line-height: 22px;
            text-align: center;
            margin-top: 20px;
        }

        .yzp-black-theme .yzp-renewal-notice {
            color: #000;
        }

        .yzp-white-theme .yzp-renewal-notice {
            color: #eee;
        }

        .yzp-black-theme span.yzp-save-percent {
            color: #000;
        }

        .yzp-white-theme span.yzp-save-percent {
            color: #fff952;
        }

        .yzp-white-theme .yzp-box-bonus:last-of-type {
            margin-bottom: 0;
        }

        .yzp-box-tag {
                text-align: center;
    background: yellow;
    color: #000;
    margin: auto;
    padding: 9px 15px;
    border-radius: 50px;
    margin-bottom: 35px;
    font-weight: 600;
    position: absolute;
    top: -19px;
    left: 0;
    right: 0;
    width: 88px;
    font-size: 16px;
        }

    </style>

    <?php

        $addons = array(
            array( 'title' => 'BuddyPress Membership Restrictions', 'single_site' => 99 ),
            array( 'title' => 'BuddyPress Block Members', 'single_site' => 28 ),
            array( 'title' => 'BuddyPress Moderation', 'single_site' => 49 ),
            array( 'title' => 'BuddyPress Profile Completeness', 'single_site' => 39 ),
            array( 'title' => 'BuddyPress Edit Activity', 'single_site' => 39 ),
            array( 'title' => 'BuddyPress Activity Reactions', 'single_site' => 28 ),
            array( 'title' => 'BuddyPress Social Share', 'single_site' => 24 ),
            array( 'title' => 'BuddyPress MyCRED Integration', 'single_site' => 18 ),
            array( 'title' => 'BuddyPress Amazon S3', 'single_site' => 49 ),
            array( 'title' => 'BuddyPress Advanced Members Search', 'single_site' => 49 ),
        );

        $upcoming = array(
            array( 'title' => 'BP Frontend Submission ( Next Week )', 'single_site' => 99 ),
            array( 'title' => 'BuddyPress  Albums System ( September 2021 )', 'single_site' => 49 ),
            array( 'title' => 'BuddyPress Live Chat ( November 2021 )', 'single_site' => 99 )
        );


        $planned = array(
            array( 'title' => 'BuddyPress Stories', 'single_site' => 149 ),
            array( 'title' => 'BuddyPress Who Viewed My Profile?', 'single_site' => 49 ),
            array( 'title' => 'BuddyPress Resume Manager', 'single_site' => 49 )
        );


        $total = 0;

    ?>

    <style type="text/css">

    .yzp-contact-us {
        font-size: 16px;
        margin-top: 35px;
        display: block;
    }

    .yzp-contact-us a {
        font-weight: 600;
    }

    .yzp-contact-us {
        display: flex;
        align-items: center;
    }

    .yzp-contact-us .yzp-hide-offer {
        color: #555;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        margin-left: auto;
        text-decoration: none;
        vertical-align: middle;
    }

    .yzp-contact-us .yzp-hide-offer i {
        margin-right: 7px;
        width: 25px;
        height: 25px;
        line-height: 25px;
        background: #ff0000;
        text-align: center;
        color: #fff;
        border-radius: 100%;
    }

    </style>

    <div class="yzp-offer">

        <?php youzify_offer_banner(); ?>

        <div class="yzp-aap-content">

            <div class="yzp-aap-title"><i class="fas fa-gifts"></i>What's Included in Youzify All-Access Pass?</div>

            <div class="yzp-aap-addons">
                <?php foreach ( $addons as $addon ) : $total = $total + $addon['single_site']; ?>
                    <div class="yzp-addon"><i class="far fa-check-circle"></i><?php echo $addon['title'] ?> <span class="yzp-aap-value">( Price: <span class="yzp-aap-price">$<?php echo $addon['single_site']; ?>.00</span> )</span></div>
                <?php endforeach; ?>
            </div>

            <div class="yzp-aap-title" style="margin-top: 15px;"><i class="fas fa-hourglass-half"></i> Almost Completed Add-Ons</div>
            <div class="yzp-aap-addons">
                <?php foreach ( $upcoming as $addon ) : $total = $total + $addon['single_site']; ?>
                    <div class="yzp-addon"><i class="far fa-check-circle"></i><?php echo $addon['title'] ?> <span class="yzp-aap-value">( Price: <span class="yzp-aap-price">$<?php echo $addon['single_site']; ?>.00</span> )</span></div>
                <?php endforeach; ?>
            </div>

            <div class="yzp-aap-title" style="margin-top: 15px;"><i class="fas fa-clock"></i>Confirmed Upcoming Add-Ons</div>
            <div class="yzp-aap-addons">
                <?php foreach ( $planned as $addon ) : $total = $total + $addon['single_site']; ?>
                    <div class="yzp-addon"><i class="far fa-check-circle"></i><?php echo $addon['title'] ?> <span class="yzp-aap-value">( Price: <span class="yzp-aap-price">$<?php echo $addon['single_site']; ?>.00</span> )</span></div>
                <?php endforeach; ?>
            </div>

            <div class="yzp-total-value">Total Value: $<?php echo $total; ?>.00</div>

            <span class="yzp-aap-note">*Dozen of addons will be added each year.</span>
        </div>
        <div class="yzp-table">

            <?php foreach ( $boxes as $key => $box ) : ?>

            <div class="yzp-box yzp-<?php echo $box['theme'] ?>-theme yzp-<?php echo $key; ?>-box">
                <?php if( isset( $box['tag'] ) ) : ?><span class="yzp-box-tag"><?php echo $box['tag']; ?></span><?php endif; ?>
                <div class="yzp-box-head">
                    <div class="yzp-box-title"><?php echo $box['title']; ?></div>
                    <span class="yzp-save">Save <span class="yzp-save-percent"><?php echo $box['save']['percent']; ?>%</span><span class="yzp-save-price"><?php echo $box['save']['price'] .  $price['currency']; ?></span></span>
                </div>

                <div class="yzp-box-pricing">

                    <div class="yzp-price">
                        <span class="yzp-currency"><?php echo $price['currency']; ?></span>
                        <span class="yzp-amount"><?php echo $box['price']; ?></span>
                        <span class="yzp-separator">/</span>
                        <span class="yzp-per"><?php echo $price['per']; ?></span>
                    </div>

                    <div class="yzp-normally">
                        <span class="yzp-price-label">Normally</span>
                        <span class="yzp-currency"><?php echo $price['currency']; ?></span>
                        <span class="yzp-amount"><?php echo $box['normally']; ?></span>
                        <span class="yzp-separator">/</span>
                        <span class="yzp-per"><?php echo $price['per']; ?></span>
                    </div>

                </div>

                <div class="yzp-box-content">
                    <?php if ( isset( $box['benefits'] ) ) : ?>
                    <div class="yzp-benefits-title">What's Included?</div>
                    <div class="yzp-box-benefits">
                        <?php foreach ( $box['benefits'] as $benefit ) : ?>
                        <div class="yzp-box-benefit"><i class="fas fa-bullseye"></i><?php echo $benefit; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ( isset( $box['bonus'] ) ) : ?>
                    <div class="yzp-bonuses-title">Plus you will Get These FREE Bonuses!</div>
                    <div class="yzp-box-bonuses">
                        <?php foreach ( $box['bonus'] as $i => $bonus ) : ?>
                        <div class="yzp-box-bonus"><span class="yzp-bonus-tag">Bonus #<?php echo $i+1; ?></span><?php echo $bonus; ?></div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>

                <div class="yzp-box-footer">
                    <a target="_blank"class="yzp-cta-button" href="<?php echo $box['link']; ?>"><?php echo $box['cta']; ?><i class="far fa-arrow-alt-circle-right"></i></a>
                </div>

                <span class="yzp-renewal-notice">*Our previous All-Access Pass clients can also benefit from this offer by renewing for more years using this offer.</span>
            </div>

            <?php endforeach; ?>

        </div>

        <div class="yzp-contact-us">
            <div class="yzp-hide-contact"><strong>Need help?</strong> <a href="https://youzify.com/contact-us">Contact us</a> or reach us at <strong>admin@kainelabs.com</strong></div>
            <a href="<?php echo add_query_arg( 'youzify-dismiss-offer-notice', $id, youzify_get_current_page_url() ); ?>" class="yzp-hide-offer"><i class="fas fa-times"></i>Hide Offer</a>
        </div>
    </div>

    <?php
}

/**
 * Offer Banneer
 */
function youzify_offer_banner( $show_button = false ) { ?>

    <style type="text/css">

    .yzp-heading {
        display: flex;
        padding: 35px;
        margin-bottom: 35px;
        border-radius: 8px;
        background: #ffeb3b;
        align-items: center;
    }

    .kl-countdown {
        margin-left: auto;
        padding: -10px;
        border-radius: 8px;
    }
    .yzp-head-title {
        font-size: 27px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .yzp-head-date {
        font-weight: 600;
        margin-top: 15px;
    }
    .yzp-head-tag {
        display: inline-block;
        background: #000;
        padding: 8px;
        border-radius: 5px;
        color: #ffff;
        font-weight: 600;
        margin-bottom: 20px;
    }

   .allaccesspass-offer {
        background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#3F51B5,#03A9F4);f
        color: #fff;
        padding: 35px;
        border-radius: 5px;
        border-left: 8px solid #ffeb3b;
        margin-bottom: 35px;
    }

    .offer-subtitle {
        color: #ffffff;
        font-size: 19px;
        font-weight: 400;
    }

    .allaccesspass-offer.lifetime {
        background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#000000,#03A9F4);
    }

    .access-notice {
    background: rgb(0 0 0 / 0.3);
    padding: 25px;
    border-left: 8px solid #ffffff;
    border-radius: 3px;
        }
 .yz-new-addon {
   /* background: #8291e4;*/
   /*background:#673ab7;*/
   background:#f44336;
    text-align: center;
    width: 100%;
    padding: 15px 20px;
    position: relative;
    left: 0;
    line-height: 24px;
    color: #fff;
    /*background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#f44336,#E91E63);*/
    /*background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#4CAF50,#00897B);*/
    /*background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#673AB7,#E91E63);*/
    /*background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#242222,#FF5722);*/
    /*background-color: #f16c3e;*/
    /*background-image: url(https://cartflows.com/wp-content/uploads/2020/10/CF-pricing-banner.jpg);*/
    background: url(https://youzer.kainelabs.com/wp-content/uploads/2019/01/hero_decor.svg),linear-gradient(to right,#673AB7,#3b0072);
    background-size: cover;
    background-position: 0 184px;
 }

 .yz-new-addon-name {
    font-weight: 500;
 }

 .yz-view-addon {
    display: inline-block;
    background: #fff;
    color: #898989;
    padding: 10px 13px 8px;
    margin: 0;
    line-height: 14px;
    font-weight: 500;
    border-radius: 2px;
    text-transform: uppercase;
    margin-left: 10px;
    font-size: 12px;
 }

 .yz-view-addon:hover {
    color: black;
 }


 .offer-tag,
 .yz-new-addon-tag {
    padding: 15px;
    color: #3b3b3b;
    line-height:14px;
    font-weight: 500;
    border-radius: 3px;
    text-align: center;
    margin-right: 10px;
    background: #FFEB3B;
    text-transform: uppercase;
 }

.yz-new-addon-tag {
    font-size: 13px;
    padding: 7px;
        display: inline-block;
}

 .offer-tag {
    font-size: 18px;
    padding: 15px;
    display: block;
    margin-bottom: 25px;
 }
 #lifetime-aap-btn,
.offer-tag {
     transform: translate3d(0, 0, 0);
    backface-visibility: hidden;
    animation-name: shakeMe;
    animation-duration: 5s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

.blinking{
    animation:blinkingText 1s infinite;
}

.blinkingblue{
    animation:blinkingTextBlue 1s infinite;
}

@keyframes shakeMe {
    2%, 18% {
        transform: translate3d(-1px, 0, 0);
    }

    4%, 16% {
        transform: translate3d(2px, 0, 0);
    }

    6%, 10%, 14% {
        transform: translate3d(-4px, 0, 0);
    }

    8%, 12% {
        transform: translate3d(4px, 0, 0);
    }

    18.1% {
        transform: translate3d(0px, 0, 0);
    }
}
.sidenote strong,
.access-notice strong,
p.offer-desc strong {
    color: yellow;
}
.allaccesspass-offer ul li strong {
    color: yellow;
}

@keyframes blinkingText{
    0%{     color: #FFEB3B;    }
    49%{    color: #FFEB3B; }
    60%{    color: #000; }
    99%{    color: #000;  }
    100%{   color: #FFEB3B;    }
}
@keyframes blinkingTextBlue{
    0%{     color: #4bebf8;    }
    49%{    color: #4bebf8; }
    60%{    color: #252525; }
    99%{    color: #252525;  }
    100%{   color: #4bebf8;    }
}

    .kl-countdown {
        display: inline-block;
        vertical-align: middle;
    }

    .kl-countdown ul {
        background: #1d2327;
        border-radius: 8px;
    }

    .countdown-title,
    .kl-countdown ul {
        margin: 0;
        display: inline-block;
        vertical-align: middle;
    }

    .kl-countdown li {
      display: inline-block;
      margin: 0;
      font-size: 22px;
      list-style-type: none;
      padding: 1em;
      text-align: center;
      /*text-transform: uppercase;*/
      color: #fff;
    }

    .kl-countdown li span {
      display: block;
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .expired-notice {
        display: none;
    }

@media screen and ( max-width: 768px ) {
    .countdown-title {
        display: none;
    }

}

@media screen and ( max-width: 475px ) {
    .kl-countdown {
        display: block;
    }
}

.yzp-view-offer-details {
    background: #fff;
    height: 55px;
    line-height: 55px;
    width: 201px;
    text-align: center;
    border-radius: 5px;
    margin-top: 20px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    color: #1d2327;
    display: flex;
    align-items: center;
    justify-content: center;
}
    .yzp-view-offer-details span {
        margin-left: 10px;
    }

    </style>
    <div class="yzp-heading">
        <div class="yzp-offer-head">
            <div class="yzp-head-tag">ONCE IN A LIFETIME OFFER</div>
            <div class="yzp-head-title">Youzify - 7-Day All-Access Pass Offer ( HUGE SAVINGS )</div>
            <div class="yzp-head-date">Ends 18 September 2021, 23.59 GMT</div>
            <?php if ( $show_button ) : ?>
            <a class="yzp-view-offer-details" href="<?php echo add_query_arg( array( 'page' => 'youzify-panel', 'show-panel' => true ), admin_url( 'admin.php' ) ); ?>">View Offer Details<span class="dashicons dashicons-arrow-right-alt"></span></a>
            <?php endif; ?>
        </div>
        <div id="kl-countdown" class="kl-countdown">
            <ul>
              <li><span class="days">0</span>Days</li>
              <li><span class="hours">0</span>Hours</li>
              <li><span class="minutes">0</span>Minutes</li>
              <li><span class="seconds blinking">0</span>Seconds</li>
            </ul>
      </div>
    </div>

     <script type="text/javascript">
      /*! yscountdown v1.0.0 | Yusuf SEZER <yusufsezer@mail.com> | MIT License | https://github.com/yusufsefasezer/ysCountDown.js */
    !function(t,o){"function"==typeof define&&define.amd?define([],function(){return o(t)}):"object"==typeof exports?module.exports=o(t):t.ysCountDown=o(t)}("undefined"!=typeof global?global:"undefined"!=typeof window?window:this,function(u){"use strict";return function(t,o){var n={},r=null,a=null,e=null,l=null,i=!1;n.init=function(t,o){if(!("addEventListener"in u))throw"ysCountDown: This browser does not support the required JavaScript methods.";if(n.destroy(),r="string"==typeof t?new Date(t):t,!((e=r)instanceof Date)||isNaN(e))throw new TypeError("ysCountDown: Please enter a valid date.");var e;if("function"!=typeof o)throw new TypeError("ysCountDown: Please enter a callback function.");a=o,s()},n.destroy=function(){a=r=null,f(),l=null,i=!1};var s=function(){e||(e=setInterval(function(){var t,o;t=new Date,(o=Math.ceil((r.getTime()-t.getTime())/1e3))<=0&&(i=!0,f()),l={seconds:o%60,minutes:Math.floor(o/60)%60,hours:Math.floor(o/60/60)%24,days:Math.floor(o/60/60/24)%7,daysToWeek:Math.floor(o/60/60/24)%7,daysToMonth:Math.floor(o/60/60/24%30.4368),weeks:Math.floor(o/60/60/24/7),weeksToMonth:Math.floor(o/60/60/24/7)%4,months:Math.floor(o/60/60/24/30.4368),monthsToYear:Math.floor(o/60/60/24/30.4368)%12,years:Math.abs(r.getFullYear()-t.getFullYear()),totalDays:Math.floor(o/60/60/24),totalHours:Math.floor(o/60/60),totalMinutes:Math.floor(o/60),totalSeconds:o},a(l,i)},100))},f=function(){e&&(clearInterval(e),e=null)};return n.init(t,o),n}});


    ( function( $ ) {

    $( document ).ready( function() {

   // var endDate = "< ?php echo date('Y-m-d', strtotime(' +1 day')) ?>";
    var endDate = "2021/09/19";

    var myCountDown = new ysCountDown(endDate, function (remaining, finished) {

      if ( finished ) {
         $( '.kl-countdown' ).text( 'Offer Expired' );
      }

      $( '.days' ).text( remaining.totalDays );
      $( '.hours' ).text( remaining.hours );
      $( '.minutes' ).text( remaining.minutes );
      $( '.seconds' ).text( remaining.seconds );

    });

    });

    })( jQuery );
  </script>
    <?php

}