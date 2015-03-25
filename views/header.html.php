        <header id="global-header" class="navbar">
            <a class="ghost-logo" href="<?php bloginfo('url');?>" data-off-canvas="left" title="<?php bloginfo('title');?> &middot; <?php bloginfo('description');?>"><span class="hidden"><?php bloginfo('title'); ?></span></a>
            <nav id="global-nav" role="navigation">
                <ul id="main-menu" >
<?php 
  $post_types = get_post_types(array('show_ui'=>true),'objects');
  foreach ($post_types as $name=>$post_type) : 
    if (in_array($name, array_keys(Gust::$options['main_posttypes']))) :
?>
                        <li class="content" id="menu-<?php echo $name; ?>"><a href="<?php echo GUST_ROOT; ?>/<?php echo $name; ?>"><?php echo $post_type->labels->name; ?></a></li>
<?php endif; ?>                    
<?php endforeach; ?>                    
                        <li class="editor"><a href="<?php echo GUST_ROOT; ?>/editor/post"><?php _e('New Post','gust'); ?></a></li>                    
                        <li class="settings"><a href="<?php echo admin_url('options-general.php?page=gust_options'); ?>"><?php _e('Settings','gust'); ?></a></li>
                    

                    <li id="usermenu" class="subnav">
                        <a href="#" data-toggle="ul.user-menu" class="dropdown">
                            <img class="avatar" src="<?php echo get_avatar_url(get_current_user_id(),48); ?>" alt="<?php _e('Avatar','gust'); ?>" />
                            <span class="name"><?php $user = wp_get_current_user(); echo($user->data->display_name);?></span>
                        </a>
                        <ul class="user-menu overlay">
<!--                            <li class="usermenu-profile"><a href="<?php echo GUST_ROOT; ?>/settings/user/"><?php _e('Your Profile','gust'); ?></a></li>
                            <li class="divider"></li>
                            <li class="usermenu"><a href="<?php bloginfo('url'); ?>/wp-admin/"><i class="fa fa-cog"></i> <?php _e('WP Admin','gust'); ?></a></li>
                            <li class="divider"></li>
                            <li class="usermenu"><a href="<?php echo GUST_ROOT; ?>/signout/"><i class="fa fa-sign-out"></i> <?php _e('Sign Out','gust'); ?></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
