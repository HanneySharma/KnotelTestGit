<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: Sales Force
  Author: Teq Mavens
  Author URI: http://twitter.com/hiddenpearls
*/


wp_enqueue_style( 'salesforcemap-form', '/wp-content/plugins/sales-force/css/map.css' );
//wp_enqueue_script('salesforcejquerymin-js','/wp-content/plugins/sales-force/js/jquery-3.2.1.min.js');
//wp_enqueue_script('salesforcevaildat-js','/wp-content/plugins/sales-force/js/jquery.validate.min.js');
//wp_enqueue_script('salesforcecustom-js','/wp-content/plugins/sales-force/js/custom.js');

add_action( 'init', 'process_salesforce' );
function process_salesforce() {
    global $wpdb;
    $wpdb->query('CREATE TABLE IF NOT EXISTS wp_salesforcesettings (id int(11) NOT NULL AUTO_INCREMENT,security_key varchar(255) NOT NULL,email varchar(255) NOT NULL,password varchar(255)NOT NULL,PRIMARY KEY (id))');
    add_action('admin_menu', 'salesforceMenu');    
}



function salesforceMenu(){
    add_menu_page('salesforce_settings', 'Sales Force Settings', 'manage_options','salesforce_settings','salesforce_options');
}

function salesforce_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    global $wpdb;
    $querystr = "SELECT * FROM `wp_salesforcesettings` limit 1";
    $pageposts = $wpdb->get_row($querystr, OBJECT);
    $security_key = (!empty($pageposts))? $pageposts->security_key : '';
    $email = (!empty($pageposts))? $pageposts->email : '';
    $password = (!empty($pageposts))? $pageposts->password : '';
    	echo '<div class="wrap">';
    	if(isset($_GET['action']) && $_GET['action'] == 'update'){
            echo '<p class="message">Sales Force setting has been updated successfully.</p>';
        } else if(isset($_GET['action']) && $_GET['action'] == 'save'){
            echo '<p class="message">Sales Force setting has been saved successfully.</p>';
        } 
        echo '<p><b><h1>Sales Force Settings</h1></b></p>';
        echo '<form method="post" id="add_sales_form" action = "" class="mapForm">';
        echo '<table width="100%"><tbody>';
        echo '<tr>';
        echo '<td><strong>Security Key:</strong></td>';
        echo '<td><input type="text" name="security_key" size="45" placeholder = "Enter security key" value="'.$security_key.'"/></td>';
        echo '</tr><tr><td>';  
        if(!empty($pageposts)){
            ?>
            <input type="hidden" value="<?php echo $pageposts->id; ?>" name="id"> 
            <?php 
        } 
        echo '<strong>Email:</strong></td>';
        echo '<td><input type="text" name="email"  value="'.$email.'" size="45" placeholder = "Enter email address" /></td>';
        echo '</tr><tr>';
        echo '<td><strong>Password:</strong></td>';
        echo '<td><input type="password" name="password"  value="'.$password.'"  size="45" placeholder = "Enter email address"/>';
        echo '<input type="hidden" name="type" value = "settings" /></td>';
        echo '</tr><tr><td></td></tr><tr>';
        echo '<td></td><td ><input class="btn" type="submit" name="Submit" value="Save"/></td>';
        echo '</tr></tbody></table>';
        echo '</form>';
        echo '</div>';   
        
    }


        
    if(isset($_POST['security_key']) && isset($_POST['security_key']) && isset($_POST['email']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password']) && $_POST['type'] == 'settings' ){
        global $wpdb;
        if(!isset($_POST['id'])){
            $wpdb->query("INSERT INTO wp_salesforcesettings (security_key,email,password) VALUES ('".$_POST['security_key']."','".$_POST['email']."','".$_POST['password']."')");
            header("Location: admin.php?page=salesforce_settings&action=save"); 
            exit;
        } else {
            $wpdb->query("UPDATE wp_salesforcesettings SET security_key= '".$_POST['security_key']."', email='".$_POST['email']."',password='".$_POST['password']."' WHERE id = ".$_POST['id']);
            header("Location: admin.php?page=salesforce_settings&action=update"); 
            exit;
        }
    }
        
        
?>
