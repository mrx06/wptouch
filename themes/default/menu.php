<?php header("Content-type:text/html; charset=utf-8"); ?>
<?php require_once('../../../../../wp-blog-header.php'); ?>

<!--
Here's the  drop-down menu.

We're checking the pages that are enabled in the admin, and the icons which were assigned to them. We're also checking to see if the user has enabled the RSS< Mail, and/or Home link to be shown in the menu.
-->
        <div id="dropmenu-inner">
            <ul>
            <?php if (bnc_is_home_enabled()) { ?><li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wptouch/images/icon-pool/Home.png" alt="" />Home</a></li> <?php } ?>
            <?php
            $pages = bnc_wp_touch_get_pages();
            foreach ($pages as $p) {
            $image = get_bloginfo('wpurl') . '/wp-content/plugins/wptouch/images/icon-pool/' . $p['icon'];
            echo('<li><a href="' . get_permalink($p['ID']) . '"><img src="' . $image . '" />' . $p['post_title'] . '</a></li>'); } ?>
            <?php if (bnc_is_rss_enabled()) { ?><li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wptouch/images/icon-pool/RSS.png" alt="" />RSS Feed</a></li><?php } ?>
            <?php if (bnc_is_email_enabled()) { ?><li class="noborder"><a href="mailto:<?php bloginfo('admin_email'); ?>"><img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wptouch/images/icon-pool/Mail.png" alt="" />E-Mail</a></li><?php } ?>
            <?php if (!bnc_is_js_enabled()) { ?>
            <li class="noarrow"><a class="menu-close" href="javascript:document.getElementById('dropmenu').style.display = 'none';">
            <img src="<?php bloginfo('template_directory'); ?>/images/cross.png" alt="" /> Close Menu</a></li>
            <?php } ?>
            </ul>
        </div>