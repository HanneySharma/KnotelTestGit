<?php
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri(). '/css/style.css' );
        wp_enqueue_style( 'clock-style', get_stylesheet_directory_uri(). '/clockpicker-gh-pages/dist/jquery-clockpicker.css' );
        wp_enqueue_style( 'slippry-style', get_stylesheet_directory_uri(). '/css/slippry.css' );
	wp_enqueue_style( 'datepicker-style', get_stylesheet_directory_uri(). '/css/datapicker/datepicker3.css' );
        
        
    }
    
    function register_my_menus() {
        register_nav_menus(
            array(
            'extra-menu' => __( 'Extra Menu' ),
            'home-sub-menu' => __( 'Home Sub Menu' )
            )
        );
    }
    add_action( 'init', 'register_my_menus' );
    
    //***********************START code for custom map menus in admin section***********************************************//
    function my_plugin_menu() {
        add_menu_page('Map Settings', 'Map', 'manage_options','map_settings','my_map_options');
        add_submenu_page('map_settings', 'Add Markers', 'Add Markers', 'manage_options', 'add_markers', 'add_map_markers');
    }
	
    //Code for remove admin bar from front end for login user.
    add_filter('show_admin_bar', '__return_false'); 
    
    //****************************START Code for add guests.*************************************************//
    function addguests(){
        if(isset($_POST)){
            $eventid = '';
            $submitterName = '';
            $submitterEmail = '';
            $guests = array();
            if(isset($_POST['evtid']) && !empty($_POST['evtid'])){
                $eventid = $_POST['evtid'];
            }
            if(isset($_POST['submitterName']) && !empty($_POST['submitterName'])){
                $submitterName = $_POST['submitterName'];
            }
            if(isset($_POST['submitterEmail']) && !empty($_POST['submitterEmail'])){
                $submitterEmail = $_POST['submitterEmail'];
            }
            $guestList ='';
            if(isset($_POST['guest']) && !empty($_POST['guest'])){
                $guests = $_POST['guest'];
                foreach($guests as $guest){
                  $guestList .= '{"name":"'.$guest['name'].'","email":"'.$guest['email'].'"},';
                }
                $guestList = rtrim($guestList,',');
            }
            
            exec('curl -d \'["'.$eventid.'", { "guests": ['.$guestList.'], "submitterName": "'.$submitterName.'", "submitterEmail": "'.$submitterEmail.'", "shouldSendMailToGuest": false }]\' -H "Content-Type: application/json" -X POST https://app.knotel.com/methods/eventRSVP');
            exit;
        }
    }
    add_action('wp_ajax_addguests', 'addguests');
    add_action('wp_ajax_nopriv_addguests', 'addguests');
    
    //****************************END Code for add guests.*************************************************//
    
    //****************************START Code for add meta boxes fields for press page.*************************************************//
    
        add_action( 'add_meta_boxes', 'add_employee_meta' );
	/* Saving the data */
	add_action( 'save_post', 'employee_meta_save' );
	/* Adding the main meta box container to the post editor screen */
	function add_employee_meta() {
                $category_detail = get_the_category($post->ID);
                foreach($category_detail as $key => $val){
                        if($val->term_id == 13){
                            add_meta_box(
                                'employee-details',
                                'News Details',
                                'employee_details_init', 
                                'post'
                            );      
                        }
                }            
            
        }  

	/*Printing the box content */
	function employee_details_init() {
	    global $post;
	    // Use nonce for verification
	    wp_nonce_field( plugin_basename( __FILE__ ), 'employee_nonce' );
	    ?>
	    <div id="employee_meta_item">
	    <?php

	    //Obtaining the linked employeedetails meta values
            $employeeDetails = get_post_meta($post->ID,'employeeDetails',true);
            //print_r($employeeDetails);die;
	    $c = 0;
	    if ( count( $employeeDetails ) > 0 && is_array($employeeDetails)) {
	        foreach( $employeeDetails as $employeeDetail ) { 
                    if ( isset( $employeeDetail['title'] ) || isset( $employeeDetail['link'] ) || isset($employeeDetail['description']) ) {
                        $checked = (isset($employeeDetail['featurednews'])? "checked='checked'" : '');
                        $orders1 = (isset($employeeDetail['orders']) && !empty($employeeDetail['orders'])) ? $employeeDetail['orders'] : 0 ;
                        $htmls = '<p> 
                        <span>Title: <br><input type="text" name="employeeDetails[%1$s][title]" value="%2$s" /></span>
                        <span>Link:<br><input type ="text" name="employeeDetails[%1$s][link]" value="%3$s" ></span><br>
                        <span>Press Logo Image:<br><input class="imageIn1" type="text" value="'.$employeeDetail['press-image'].'" name="employeeDetails[%1$s][press-image]"><input type="button" class="meta-image-button1 button" value="Upload"/></span><br>
                            
                        <span>Tag Line:<br><textarea name="employeeDetails[%1$s][description]" rows="1" cols="20" >'.$employeeDetail['description'].'</textarea></span><br>
                        <span>Set as Featured news:<br><input class = "clscheck" type="checkbox" name="employeeDetails[%1$s][featurednews]" value = "1" '.$checked.'></span><br>    
                         <span class = "clsselect" style="display:'.((isset($employeeDetail['featurednews']))? "block":"none").'">Set Orders:<br>
                        <select name="employeeDetails[%1$s][orders]">
                        
<option '.(($orders1 == 1) ?  "selected" : "" ).' value="1">1</option>
    <option '.(($orders1 == 2) ?  "selected" : "" ).' value="2">2</option>
        <option '.(($orders1 == 3) ?  "selected" : "" ).' value="3">3</option>
            <option '.(($orders1 == 4) ?  "selected" : "" ).' value="4">4</option>
                <option '.(($orders1 == 5) ?  "selected" : "" ).' value="5">5</option>
                    <option '.(($orders1 == 6) ?  "selected" : "" ).' value="6">6</option>
                        
    </select></span><br>            
                        <a href="#" class="remove-package">%4$s</a>
                        </p>';
                        printf($htmls, $c, $employeeDetail['title'], $employeeDetail['link'], 'Remove' );
	                $c = $c +1;
	            }
	        }
	    }

	    ?>
	<span id="output-package"></span>
	<a href="#" class="add_package"><?php _e('Add News Links'); ?></a>
	<script>
	    var $ =jQuery.noConflict();
	    $(document).ready(function() {
	        var count = <?php echo $c; ?>;
	        $(".add_package").click(function() {
	            count = count + 1;
	            $('#output-package').append(
                        '<p> \n\
                        <span>Title: <br><input type="text" name="employeeDetails['+count+'][title]" value="" /></span>\n\
                        <span>Link:<br><input type ="text" name="employeeDetails['+count+'][link]" ></span><br>\n\
                        <span>Press Logo Image:<br>\n\
                        <input class="imageIn1" type="text" value="" name="employeeDetails['+count+'][press-image]"><input type="button" class="meta-image-button1 button" value="<?php _e( 'Upload', 'prfx-textdomain' ); ?>"/></span><br>\n\
                        <span>Tag Line:<br><textarea name="employeeDetails['+count+'][description]" rows="1" cols="20" ></textarea></span><br>\n\
                        <span>Set as Featured news:<br><input class ="clscheck" type="checkbox" name="employeeDetails['+count+'][featurednews]" value="1"></span><br>\n\
<span class = "clsselect" style="display:none;">Set Orders:<br> <select  name="employeeDetails['+count+'][orders]"><option value="" selected disabled hidden>Select Order</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select> </span><br>\n\
                        <a href="#" class="remove-package"><?php echo "Remove"; ?></a></p>' );           
                    return false;
	        });
                
                $(document.body).on('click','.remove-package',function() {
                    $(this).parent().remove();
	        });
                
                
                
	    });
            
            
            $(document).on('change','input.clscheck',function(e) {
                    if($(this).is(':checked')){
                        if($(document).find('.clscheck:checked' ).length > 6 ){
                            e.preventDefault();
                            e.stopPropagation();
                            $(this).prop('checked', false);
                            //$(this).parent().parent('select').prepend("<option value='' selected='selected'>Select Order</option>");
                            alert('You can select only six popular press');
                            return false;
                            
                        }
                        $(this).parent().parent().children('span.clsselect').show();
                    } else {
                         $(this).parent().parent().children('span.clsselect').hide();
                    }
                    
            });
            
              

                var meta_image_frame1;
                $(document).on('click','input.meta-image-button1',function(e){     
                   
                    // Prevents the default action from occuring.
                    e.preventDefault();
                    var  self = $(this);
                    self.parent('span').find('input.imageIn1').addClass('active');
                    // If the frame already exists, re-open it.
                    if ( meta_image_frame1 ) {
                        meta_image_frame1.open();
                        return;
                    }
                    // Sets up the media library frame
                        meta_image_frame1 = wp.media.frames.meta_image_frame1 = wp.media({
                        title: "News Images",
                        button: { text:  "UPLOAD" },
                        library: { type: 'image' }
                    });
 
                    // Runs when an image is selected.
                    meta_image_frame1.on('select', function(){
                        // Grabs the attachment selection and creates a JSON representation of the model.
                        var media_attachment = meta_image_frame1.state().get('selection').first().toJSON();
                        // Sends the attachment URL to our custom image input field.
                        $(document).find('input.imageIn1.active').val(media_attachment.url);
                        $(document).find('input.imageIn1').removeClass('active');
                        
                    });
                    // Opens the media library frame.
                    meta_image_frame1.open();
                });        
            </script>
	</div><?php
	}
	/* Save function for the entered data */
	function employee_meta_save( $post_id ) {
	    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	        return;
	    // Verifying the nonce
	    if ( !isset( $_POST['employee_nonce'] ) )
	        return;

	    if ( !wp_verify_nonce( $_POST['employee_nonce'], plugin_basename( __FILE__ ) ) )
	        return;
	    // Updating the employeeDetails meta data
	    $employeeDetails = $_POST['employeeDetails'];

	    update_post_meta($post_id,'employeeDetails',$employeeDetails);
	}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #output-package p  span,#employee_meta_item p  span {
  display: inline-block;
}
#output-package > p,#employee_meta_item > p {
  border-bottom: 1px solid #cecece;
  margin-bottom: 33px;
  padding-bottom: 21px;
}
#output-package  p span input,#employee_meta_item  p span input {
  
  height: 35px;
}
#output-package  p span textarea,#employee_meta_item  p span textarea {
  
  min-height: 100px;
}
#output-package > p:last-child,#employee_meta_item > p:last-child {
  border-bottom: 0px solid #cecece;
}

.remove-package, .add_package {
  background: #008EC2;
  border: 1px solid #025b8f;
  border-radius: 5px;
  display: block;
  margin-bottom: 5px;
  padding: 10px 5px;
  position: relative;
  text-decoration: none;
  width: 94px;
  color: #fff;
  box-shadow: 2px 2px 2px  #000;
}
.remove-package:hover, .add_package:hover{
    color: #000;
}
.remove-package {
  background: #d54e21 none repeat scroll 0 0;
  border: 1px solid;
  border-radius: 6px;
  color: #fff;
  padding: 5px;
  text-decoration: none;
  width: 47px;
  margin-top: 10px;
}

input.meta-image-button[type="button"],input.meta-image-button1[type="button"] {
background: #13beeb none repeat scroll 0 0;
color: #fff;
display: inline-block;
height: 36px !important;
margin-left: -2px;
line-height: 10px;
margin-top: -5px;
box-shadow: none;
}
  </style>';
}


//Function for add pagination on blogs page.
function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination"><ul>' . "\n";

    /** Previous Post Link */
    $pre = '<li>'.get_previous_posts_link().'</li>';
    if ( get_previous_posts_link() )
        printf( $pre . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
	$next = '<li>'. get_next_posts_link().'</li>';
    if ( get_next_posts_link() )
        printf($next. "\n", get_next_posts_link());

    echo '</ul></div>' . "\n";

} 


//Function for store users information on database from all contactforms7.
    function storeuserinformation(){
        if(!empty($_POST)){
            $fields = array();
            if($_POST['formtype'] == 'homepagegetintouch'){
                $contact_name = !empty($_POST['c-name'])? $_POST['c-name'] : "";
                $contact_phone = !empty($_POST['c-phone'])? $_POST['c-phone'] : "";
                $contact_email = !empty($_POST['your-email'])? $_POST['your-email'] : "";
                $event_name = !empty($_POST['n-event'])? $_POST['n-event'] : "";
                $av_requirements = !empty($_POST['av-requirements'])? $_POST['av-requirements'] : "";
                $event_date = !empty($_POST['ev-date'])? $_POST['ev-date'] : "";
                $start_time = !empty($_POST['start-time'])? $_POST['start-time'] : "";
                $end_time = !empty($_POST['end-time'])? $_POST['end-time'] : "";
                $head_count = !empty($_POST['head-count'])? $_POST['head-count'] : "";
                $budget = !empty($_POST['budget'])? $_POST['budget'] : "";
                $form_type = 0; 
                $event_date = date('Y-m-d', strtotime(str_replace('/', '-', $event_date)));
                if(!empty($contact_name) && !empty($contact_email) && !empty($event_date)){
                    global $wpdb;
                    $wpdb->query("INSERT INTO wp_userslead(contact_name,contact_lastname,contact_phone,contact_email,event_name,av_requirements,event_date,start_time,end_time,head_count,budget,team_size,project_move_date,locofinterest,contact_primaryname,contact_primaryemail,entity_name,company_name,company_website,form_type) VALUES ('".$contact_name."','NULL','".$contact_phone."','".$contact_email."','".$event_name."','".$av_requirements."','".$event_date."','".$start_time."','".$end_time."','".$head_count."','".$budget."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',$form_type)");
                    
                }
           
            }
            
            elseif($_POST['formtype'] == 'eventdetailmailinglist'){
                $contact_name = !empty($_POST['first-name-event'])? $_POST['first-name-event'] : "";
                $contact_lastname = !empty($_POST['last-name-event'])? $_POST['last-name-event'] : "";
                $contact_email = !empty($_POST['your-email-event'])? $_POST['your-email-event'] : "";
                $form_type = 1; 
                if(!empty($contact_email)){
                    global $wpdb;
                    $response = $wpdb->query("INSERT INTO wp_userslead(contact_name,contact_lastname,contact_phone,contact_email,event_name,av_requirements,event_date,start_time,end_time,head_count,budget,team_size,project_move_date,locofinterest,contact_primaryname,contact_primaryemail,entity_name,company_name,company_website,form_type) VALUES ('".$contact_name."','".$contact_lastname."','NULL','".$contact_email."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',$form_type)");
                     if($response == 1){
                        die("dm_ent_sss");                        
                     }else{
                        die("dm_ent_fall");
                     } 
                    
                }
              
            }
            
            elseif($_POST['formtype'] == 'getintouchtenant'){
                $contact_name = !empty($_POST['full-name'])? $_POST['full-name'] : "";
                $contact_phone = !empty($_POST['c-phone'])? $_POST['c-phone'] : "";
                $contact_email = !empty($_POST['your-email'])? $_POST['your-email'] : "";
                $team_size = !empty($_POST['team-size'])? $_POST['team-size'] : "";
                $project_move_date = !empty($_POST['projected-move-indate'])? $_POST['projected-move-indate'] : "";
                $locofinterest = !empty($_POST['locationofinterest'])? $_POST['locationofinterest'] : "";
                $contact_primaryname = !empty($_POST['entity-primary-name'])? $_POST['entity-primary-name'] : "";
                $contact_primaryemail = !empty($_POST['entity-primary-email'])? $_POST['entity-primary-email'] : "";
                $entity_name = !empty($_POST['entity-name'])? $_POST['entity-name'] : "";
                $project_move_date = \DateTime::createFromFormat('m-d-Y', $project_move_date)->format('Y-m-d'); 
                $form_type = 2;
                if(!empty($contact_name) && !empty($contact_email) && !empty($project_move_date)){
                    global $wpdb;
                    $wpdb->query("INSERT INTO wp_userslead(contact_name,contact_lastname,contact_phone,contact_email,event_name,av_requirements,event_date,start_time,end_time,head_count,budget,team_size,project_move_date,locofinterest,contact_primaryname,contact_primaryemail,entity_name,company_name,company_website,form_type) VALUES ('".$contact_name."','NULL','".$contact_phone."','".$contact_email."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','".$team_size."','".$project_move_date."','".$locofinterest."','".$contact_primaryname."','".$contact_primaryemail."','".$entity_name."','NULL','NULL',$form_type)");
                    
                }
    
                
            }elseif($_POST['formtype'] == 'homepageeventsandnews'){
                $contact_name = !empty($_POST['first-name-sub'])? $_POST['first-name-sub'] : "";
                $contact_lastname = !empty($_POST['last-name-sub'])? $_POST['last-name-sub'] : "";
                $contact_email = !empty($_POST['your-email-sub'])? $_POST['your-email-sub'] : "";
                $form_type = 3;
                if(!empty($contact_email)){
                    global $wpdb;
                $wpdb->query("INSERT INTO wp_userslead(contact_name,contact_lastname,contact_phone,contact_email,event_name,av_requirements,event_date,start_time,end_time,head_count,budget,team_size,project_move_date,locofinterest,contact_primaryname,contact_primaryemail,entity_name,company_name,company_website,form_type) VALUES ('".$contact_name."','".$contact_lastname."','NULL','".$contact_email."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL',$form_type)"); 
                    
                }
                   
                
            }elseif($_POST['formtype'] == 'bookatourform'){
                $contact_name = !empty($_POST['book_first_name'])? $_POST['book_first_name'] : "";
                $contact_lastname = !empty($_POST['book_first_last'])? $_POST['book_first_last'] : "";
                $contact_email = !empty($_POST['book_email'])? $_POST['book_email'] : "";
                $company_website = !empty($_POST['book_company_website'])? $_POST['book_company_website'] : "";
                $company_name = !empty($_POST['book_company_name'])? $_POST['book_company_name'] : "";
                $company_location = !empty($_POST['book_location'])? $_POST['book_location'] : "";
                $company_phone = !empty($_POST['book_phone'])? $_POST['book_phone'] : "";
                $team_size = !empty($_POST['book_size'])? $_POST['book_size'] : "";
                $form_type = 4;
                global $wpdb;
                $wpdb->query("INSERT INTO wp_userslead(contact_name,contact_lastname,contact_phone,contact_email,event_name,av_requirements,event_date,start_time,end_time,head_count,budget,team_size,project_move_date,locofinterest,contact_primaryname,contact_primaryemail,entity_name,company_name,company_website,form_type) VALUES ('".$contact_name."','".$contact_lastname."','".$company_phone."','".$contact_email."','NULL','NULL','NULL','NULL','NULL','NULL','NULL','".$team_size."','NULL','".$company_location."','NULL','NULL','NULL','".$company_name."','".$company_website."',$form_type)"); 
                
            }
            
            
        }
        
    }
    add_action('wp_ajax_storeuserinformation', 'storeuserinformation');
    add_action('wp_ajax_nopriv_storeuserinformation', 'storeuserinformation');




    /************** sales Force functioning ****************/

    // get locations from salesforce 
    function salesLoctions(){
        try{
            global $wpdb;
            $querystr = "SELECT * FROM `wp_salesforcesettings` limit 1";
            $pageposts = $wpdb->get_row($querystr, OBJECT);
            if(empty($pageposts))
            {
                echo json_encode(array('status' => 0));
                exit;
            }
            $SALES_USERNAME = $pageposts->email;
            $SALES_PASSWORD = $pageposts->password;
            $SALES_SECURITY_TOKEN = $pageposts->security_key;
            require_once ('soapclient/SforceEnterpriseClient.php');
            $mySforceConnection = new SforceEnterpriseClient();

            $path =  dirname(__FILE__).'/soapclient/enterprise.wsdl.xml';
            $mySoapClient = $mySforceConnection->createConnection($path);        

            $mylogin = $mySforceConnection->login($SALES_USERNAME, $SALES_PASSWORD.$SALES_SECURITY_TOKEN);
            
            $fields = $mySforceConnection->describeSObject('Lead');
            $locationsSaleforce = array();
            foreach ($fields->fields as $key => $field) {
                if( $field->name == 'Preferred_Location__c'){
                    foreach ($field->picklistValues as $key => $loc) {
                        $locationsSaleforce[$key] = $loc->value;
                    }
                }
            }
            return $locationsSaleforce;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return array();
        }
     }



     //save lead to salesforce
    function addCompanySales(){
        try{
            global $wpdb;
            $querystr = "SELECT * FROM `wp_salesforcesettings` limit 1";
            $pageposts = $wpdb->get_row($querystr, OBJECT);
            if(empty($pageposts)){
                echo json_encode(array('status' => 0));
                exit;
            }
            $SALES_USERNAME = $pageposts->email;
            $SALES_PASSWORD = $pageposts->password;
            $SALES_SECURITY_TOKEN = $pageposts->security_key;
            require_once('soapclient/SforcePartnerClient.php');
            $mySforceConnection = new SforcePartnerClient();

            $path =  dirname(__FILE__).'/soapclient/partner.wsdl.xml';
            $mySforceConnection->createConnection($path);
            $mySforceConnection->login($SALES_USERNAME, $SALES_PASSWORD.$SALES_SECURITY_TOKEN);
        
            $records = array();
            $records[0] = new SObject();
            $records[0]->type = 'Lead';
            $records[0]->fields = array(             
                'FirstName' => !empty($_POST['book_first_name'])? $_POST['book_first_name'] : "",
                'LastName' => !empty($_POST['book_first_last'])? $_POST['book_first_last'] : "",
                'LeadSource' => "Website",
                'Company' => !empty($_POST['book_company_name'])? $_POST['book_company_name'] : "",
                'NumberOfEmployees' => !empty($_POST['book_size'])? $_POST['book_size'] : "",
                'Email' => !empty($_POST['book_email'])? $_POST['book_email'] : "",
                /*'Website' => !empty($_POST['book_company_website'])? $_POST['book_company_website'] : "",*/
                'Phone' => !empty($_POST['book_phone'])? $_POST['book_phone'] : "",
                'Status' => "New",
                'Preferred_Location__c' => !empty($_POST['book_location'])? $_POST['book_location'] : ""
            );
            $response = $mySforceConnection->create($records);

            if($response[0]->success=='1'){    
                echo json_encode(array('status' => 1));
                exit;
            } else {
                $messgae = '';
                if(isset($response[0]->errors)){
                    foreach ($response[0]->errors as $key => $error) {
                        $messgae .= $error->message."<br>";
                    }
                }
                echo json_encode(array('status' => 0,'message' => $messgae));
                exit;
            }
        } catch (Exception $e) {
            echo json_encode(array('status' => 0,'message' => $e));
            exit;
        }
     }
    add_action('wp_ajax_addCompanySales', 'addCompanySales');
    add_action('wp_ajax_nopriv_addCompanySales', 'addCompanySales');

    /************** sales Force functioning ****************/

?>
