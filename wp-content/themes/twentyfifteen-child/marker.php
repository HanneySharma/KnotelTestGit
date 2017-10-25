<?php
/**
 * Template Name: Marker Page
 */



if($_POST['type'] == 'marker'){
    if(!empty($_POST['title']) && !empty($_POST['link']) && !empty($_POST['longitude']) && !empty($_POST['latitude']) && !empty($_POST['address'])){
        global $wpdb;
        $tablename = $wpdb->prefix.'markers';
        if($wpdb->query("INSERT INTO wp_markers(title,address,lat,lng,link) VALUES ('".$_POST['title']."','".$_POST['address']."','".$_POST['latitude']."', '".$_POST['longitude']."', '".$_POST['link']."')")){
            $url =  admin_url('admin.php?page=add_markers');
            wp_redirect($url);
        }    
    
    }else{
        $url =  admin_url('admin.php?page=add_markers');
        wp_redirect($url);
    }

    
}else{
     if(!empty($_POST['zoom']) && !empty($_POST['longitude']) && !empty($_POST['latitude'])){
        global $wpdb;
        if($wpdb->query("INSERT INTO wp_mapsettings (zoom,lat,lag) VALUES ('".$_POST['zoom']."','".$_POST['latitude']."','".$_POST['longitude']."')")){
            $url =  admin_url('admin.php?page = map_settings');
            wp_redirect($url);
        }    
    
    }else{
        $url =  admin_url('admin.php?page = map_settings');
        wp_redirect($url);
    }
    
}



?>





