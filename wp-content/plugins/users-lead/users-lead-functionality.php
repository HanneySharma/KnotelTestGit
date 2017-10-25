<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: Users Lead
  Author: Teq Mavens
  Author URI: http://twitter.com/hiddenpearls
*/


wp_enqueue_style( 'map-form', '/wp-content/plugins/custom-map/css/map.css' );
//wp_enqueue_script('jquerymin-js','/wp-content/plugins/custom-map/js/jquery-3.2.1.min.js');
//wp_enqueue_script('vaildat-js','/wp-content/plugins/custom-map/js/jquery.validate.min.js');
//wp_enqueue_script('custom-js','/wp-content/plugins/custom-map/js/custom.js');

add_action( 'init', 'userslead_post' );
function userslead_post() {
    global $wpdb;
    //$wpdb->query('CREATE TABLE IF NOT EXISTS wp_mapsettings (id int(11) NOT NULL AUTO_INCREMENT,zoom int(11) NULL,lat float(10,6) NULL,lag float(10,6) NULL,PRIMARY KEY (id))');
    add_action('admin_menu', 'usersLead');    
}



function usersLead(){
    add_menu_page('Users Leads', 'Users Leads','manage_options','users_leads','HomeSubscribtion');
    //add_submenu_page('users_leads', 'Home Page Get In Touch Users', 'Home Page Get In Touch Users', 'manage_options', 'home_get_users', 'GetintouchHome');
    add_submenu_page('users_leads', 'Home Page subscription Users', 'Home Page subscription Users', 'manage_options', 'home_sub_users', 'HomeSubscribtion');
    add_submenu_page('users_leads', 'Event Mailing Users', 'Event Mailing Users', 'manage_options', 'event_mailing_users', 'EventsMailinglst');
    add_submenu_page('users_leads', 'Tenant Get In Touch Users', 'Tenant Get In Touch Users', 'manage_options', 'tenant_get_users', 'TenantMalinglist');
    add_submenu_page('users_leads', 'Sales Force Users', 'Sales Force Users', 'manage_options', 'sales_force_users', 'Homesalesforce');
    
}



    function GetintouchHome() {        
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		global $wpdb;
		$querystr = "SELECT * FROM `wp_userslead` where form_type = 0";
                $pageMarkers = $wpdb->get_results($querystr, OBJECT);
		$html = "
		<h2>Home Page Get In Touch Users List</h2>
		<table border='0' width='100%' class='wp-list-table widefat fixed striped posts'><tbody>
		<tr>
		<td>S.no</td>
		<td>Contact Name</td>
		<td>Contact Phone</td>
		<td>Contact Email</td>
		<td>Name of Event</td>
		<td>AV Requirements</td>
                <td>Event Date</td>
		<td>Start Time</td>
                <td>End Time</td>
                <td>Head Count</td>
                <td>Budget</td>
                <td>Requested On</td>
		</tr>
		";
			if(!empty($pageMarkers)){
				foreach ($pageMarkers as $key => $pageMarkers) {
					$id = $key+1;
                                        
                                        $utc = new DateTimeZone('UTC');
                                        $amla = new DateTimeZone('America/New_York');
                                        $two_past_midnight = new DateTime($pageMarkers->created, $utc);
                                        $two_past_midnight->setTimeZone($amla);
                                        $requestedon  = $two_past_midnight->format('m-d-Y h:i a');
                                        
					$html .= '<tr>
						<td>'.$id.'</td>	
						<td>'.$pageMarkers->contact_name.'</td>	
						<td>'.$pageMarkers->contact_phone.'</td>	
						<td>'.$pageMarkers->contact_email.'</td>	
						<td>'.$pageMarkers->event_name.'</td>
                                                <td>'.$pageMarkers->av_requirements.'</td>
                                                <td>'.$pageMarkers->event_date.'</td>
                                                <td>'.$pageMarkers->start_time.'</td>    
                                                <td>'.$pageMarkers->end_time.'</td>   
                                                <td>'.$pageMarkers->head_count.'</td>       
                                                <td>'.$pageMarkers->budget.'</td>       
                                                <td>'.$requestedon.'</td> 
					</tr>';
					
				}
			} else {
				$html .= "<tr><td  colspan='7'></td></tr><tr><td colspan='7' align='center'>No Record Found</td></tr>";
			}
		echo $html .= "</tbody></table>";

	}
        
        
        function EventsMailinglst() {  
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		global $wpdb;
		$querystr = "SELECT * FROM `wp_userslead` where form_type = 1";
                $pageMarkers = $wpdb->get_results($querystr, OBJECT);
		$html = "
		<h2>Event Users Mailing List</h2>
		<table border='0' width='100%' class='wp-list-table widefat fixed striped posts'><tbody>
		<tr>
		<td>S.no</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Contact Email</td>
                <td>Requested On</td>
		</tr>
		";
                if(!empty($pageMarkers)){
                        foreach ($pageMarkers as $key => $pageMarkers) {
                                $id = $key+1;
                                $utc = new DateTimeZone('UTC');
                                $amla = new DateTimeZone('America/New_York');
                                $two_past_midnight = new DateTime($pageMarkers->created, $utc);
                                $two_past_midnight->setTimeZone($amla);
                                $requestedon  = $two_past_midnight->format('m-d-Y h:i a');
                                $html .= '<tr>
                                        <td>'.$id.'</td>	
                                        <td>'.$pageMarkers->contact_name.'</td>	
                                        <td>'.$pageMarkers->contact_lastname.'</td>	
                                        <td>'.$pageMarkers->contact_email.'</td>	
                                        <td>'.$requestedon.'</td>         
                                </tr>';

                        }
                } else {
                        $html .= "<tr><td  colspan='7'></td></tr><tr><td colspan='7' align='center'>No Record Found</td></tr>";
                }
		echo $html .= "</tbody></table>";

	}
  
    
        function TenantMalinglist() {  
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		global $wpdb;
		$querystr = "SELECT * FROM `wp_userslead` where form_type = 2";
                $pageMarkers = $wpdb->get_results($querystr, OBJECT);
		$html = "
		<h2>Tenant Get In Touch Form Users List</h2>
		<table border='0' width='100%' class='wp-list-table widefat fixed striped posts'><tbody>
		<tr>
		<td>S.no</td>
		<td>Full Name</td>
		<td>Email</td>
		<td>Phone</td>
                <td>Introduced Entity Name</td>
                <td>Entity Primary Contact Name</td>
                <td>Entity Primary Contact Email</td>
                <td>Team Size</td>
                <td>Project Move In Date</td>
                <td>Location Of Interest</td>
                <td>Requested On</td>
		</tr>
		";
                if(!empty($pageMarkers)){
                        foreach ($pageMarkers as $key => $pageMarkers) {
                                $id = $key+1;
                                $utc = new DateTimeZone('UTC');
                                $amla = new DateTimeZone('America/New_York');
                                $two_past_midnight = new DateTime($pageMarkers->created, $utc);
                                $two_past_midnight->setTimeZone($amla);
                                $requestedon  = $two_past_midnight->format('m-d-Y h:i a');
                                $projectmoveindate =   $projectmoveindate = \DateTime::createFromFormat('Y-m-d', $pageMarkers->project_move_date)->format('m-d-Y'); 
                                $html .= '<tr>
                                        <td>'.$id.'</td>	
                                        <td>'.$pageMarkers->contact_name.'</td>		
                                        <td>'.$pageMarkers->contact_email.'</td>	
                                        <td>'.$pageMarkers->contact_phone.'</td>    
                                        <td>'.$pageMarkers->entity_name.'</td>  
                                        <td>'.$pageMarkers->contact_primaryname.'</td>
                                        <td>'.$pageMarkers->contact_primaryemail.'</td>
                                        <td>'.$pageMarkers->team_size.'</td>      
                                        <td>'.$projectmoveindate.'</td>
                                        <td>'.$pageMarkers->locofinterest.'</td>
                                        <td>'.$requestedon.'</td>         
                                </tr>';

                        }
                } else {
                        $html .= "<tr><td  colspan='7'></td></tr><tr><td colspan='7' align='center'>No Record Found</td></tr>";
                }
		echo $html .= "</tbody></table>";

	}
        
        
        function HomeSubscribtion() {  
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		global $wpdb;
		$querystr = "SELECT * FROM `wp_userslead` where form_type = 3";
                $pageMarkers = $wpdb->get_results($querystr, OBJECT);
		$html = "
		<h2>Home Page Subscribtion Users</h2>
		<table border='0' width='100%' class='wp-list-table widefat fixed striped posts'><tbody>
		<tr>
		<td>S.no</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
                <td>Requested On</td>
		</tr>
		";
                if(!empty($pageMarkers)){
                        foreach ($pageMarkers as $key => $pageMarkers) {
                                $id = $key+1;
                                $utc = new DateTimeZone('UTC');
                                $amla = new DateTimeZone('America/New_York');
                                $two_past_midnight = new DateTime($pageMarkers->created, $utc);
                                $two_past_midnight->setTimeZone($amla);
                                $requestedon  = $two_past_midnight->format('m-d-Y h:i a');
                                $html .= '<tr>
                                        <td>'.$id.'</td>	
                                        <td>'.$pageMarkers->contact_name.'</td>		
                                        <td>'.$pageMarkers->contact_lastname.'</td>	
                                        <td>'.$pageMarkers->contact_email.'</td>    
                                        <td>'.$requestedon.'</td>         
                                </tr>';

                        }
                } else {
                        $html .= "<tr><td  colspan='7'></td></tr><tr><td colspan='7' align='center'>No Record Found</td></tr>";
                }
		echo $html .= "</tbody></table>";

	}
        function Homesalesforce() {  
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
		global $wpdb;
		$querystr = "SELECT * FROM `wp_userslead` where form_type = 4";
                $pageMarkers = $wpdb->get_results($querystr, OBJECT);
		$html = "
		<h2>Sales Force Users</h2>
		<table border='0' width='100%' class='wp-list-table widefat fixed striped posts'><tbody>
		<tr>
		<td>S.no</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Company Name</td>
                <td>Company WebSite</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Team Size</td>
                <td>Preferred Location</td>
                <td>Requested On</td>
		</tr>
		";
                if(!empty($pageMarkers)){
                        foreach ($pageMarkers as $key => $pageMarkers) {
                                $id = $key+1;
                                $utc = new DateTimeZone('UTC');
                                $amla = new DateTimeZone('America/New_York');
                                $two_past_midnight = new DateTime($pageMarkers->created, $utc);
                                $two_past_midnight->setTimeZone($amla);
                                $requestedon  = $two_past_midnight->format('m-d-Y h:i a');
                                $html .= '<tr>
                                        <td>'.$id.'</td>	
                                        <td>'.$pageMarkers->contact_name.'</td>		
                                        <td>'.$pageMarkers->contact_lastname.'</td>	
                                        <td>'.$pageMarkers->company_name.'</td>    
                                        <td>'.$pageMarkers->company_website.'</td>    
                                        <td>'.$pageMarkers->contact_email.'</td>    
                                        <td>'.$pageMarkers->contact_phone.'</td>    
                                        <td>'.$pageMarkers->team_size.'</td>        
                                        <td>'.$pageMarkers->locofinterest.'</td>        
                                        <td>'.$requestedon.'</td>         
                                </tr>';

                        }
                } else {
                        $html .= "<tr><td  colspan='7'></td></tr><tr><td colspan='7' align='center'>No Record Found</td></tr>";
                }
		echo $html .= "</tbody></table>";

	}
        
        
        
?>
