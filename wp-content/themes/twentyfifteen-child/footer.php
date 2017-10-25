<div class="press-footer">
  <div class="container">
    <h2>As Seen In</h2>
    <?php
        $args = array('posts_per_page' => 1,'category_name' => 'press','order' =>'ASC');
        query_posts($args);
        while ( have_posts() ) : the_post(); 
	    $featurePress = array();	
            $presslinkdetials = get_post_meta($post->ID,'employeeDetails',true);

            if(!empty($presslinkdetials)){
                foreach ($presslinkdetials as $key => $value) {
			if( isset($value['featurednews']) ){
				$featurePress[$key] = $value;
			} 
                }
                $order = array();
                foreach ($featurePress as $key => $value) {
        		$order[$key] = $value['orders'];
                }
                array_multisort($order, SORT_ASC, $featurePress);
                $i = 0;
                foreach($featurePress as $key => $val){
                    if($i < 6  ){
                        echo '<a class="press-footer-logo" target="_blank" href="'.$val['link'].'"><img src="'.$val['press-image'].'"/></a>';    
                    }    
                    $i++;
                }    
            }    
            endwhile;
            wp_reset_query(); 
    
    
    ?>
    
    
    
    
    
  </div>
</div>
<div class="footer-main">
             
                           	<div style="position: relative; text-align:center;" data-radium="true">
                                    <div style="display: inline-block; width: 142px; height: 142px; border-radius: 50%; position: relative; text-align: center; overflow: hidden; background-color: rgb(187, 159, 125); align-self: center; margin-top: 30px;margin-bottom: 30px; " data-radium="true" class="rmq-c4aee8dd">
                                        <div style="width: 50%; display: inline-block; margin-top: 50%; transform: translateY(-50%);" data-radium="true">
                                            <svg data-radium="true" version="1.1" preserveAspectRatio="xMidYMid meet" viewBox="-13 0 285 285" height="100%" width="100%">
                                                <g data-radium="true" fill-rule="evenodd" fill="none" stroke-width="1" stroke="none" id="Land-+-Overview">
                                                    <g data-radium="true" fill="#FEFEFE" transform="translate(-591.000000, -246.000000)" id="Land-+-Overview---Desktop-HD">
                                                        <g data-radium="true" id="Section-1---Land">
                                                            <g data-radium="true" transform="translate(460.000000, 120.000000)" id="Logo-Lockup">
                                                                <g data-radium="true" transform="translate(131.000000, 365.000000)" id="Wordmark">
                                                                    <path id="L" d="M242,42.0555556 L259,26 L259,43 L241,43 L229,42.9995428 L229,2 L242,2 L242,42.0555556 Z"></path>
                                                                    <polygon points="220 12 220 2 188 2 188 43 220.089271 43 220 33 199 33 199 27 214 27 214 18 199 18 199 12" id="E"></polygon>
                                                                    <polygon points="180 2 144 2 144 12.5 156 12.5 156 43 168 43 168 12.5 180 12.5" id="T"></polygon>
                                                                    <path id="O" d="M118.5,12 C112.710454,12 108,16.7104539 108,22.5 C108,28.2895461 112.710454,33 118.5,33 C124.289546,33 129,28.2895461 129,22.5 C129,16.7104539 124.289546,12 118.5,12 M96,22.5 C96,10.0932203 106.09322,0 118.5,0 C130.90678,0 141,10.0932203 141,22.5 C141,34.9067797 130.90678,45 118.5,45 C106.09322,45 96,34.9067797 96,22.5 Z"></path>
                                                                    <polygon points="48 2 58.8706076 2 76.8471964 25 76.8471964 2 88 2 88 43 77.8419273 43 59.0684381 19.2446156 59.0684381 43 48 43" id="N"></polygon>
                                                                    <polygon points="42 2 27 2 11.5 18.5 11.5 2 0 2 0 45.5 16 28.5 27 43 42 43 24.5 20.5" id="K"></polygon>
                                                                </g>
                                                                <polyline points="334 126 260 322 186 126" id="Flag"></polyline>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <ul data-radium="true" class = "footermenucls">
                                        <?php
                                            $menu_items = wp_get_nav_menu_items('footermenu');
                                            foreach ( (array) $menu_items as $key => $menu_item ) {
                                                if($menu_item->title == 'Careers'){
                                                    $link_target = "target = '_blank'";
                                                }elseif ($menu_item->title == 'I have space') {
                                                    $link_target = "target = '_blank'";    
                                                }else{
                                                    $link_target = "target = '_self'";
                                                }   
                                                
                                            ?>
                                        
                                        <li style="display: inline-block; width: 230px; margin-bottom: 20px;" data-radium="true">
                                            <div style="font-size: 18px; color: rgb(187, 159, 125);" data-radium="true" class="rmq-f3603296"><a href="<?php echo $menu_item->url;  ?>" <?php echo $link_target;  ?>class="gtm-extra-light"><?php echo $menu_item->title;  ?></a></div>
                                        </li>
                                         <?php     
                                            }
                                        ?>
                                    </ul>
                                    <p class="gtm-thin">Copyright © 2017 KNOTEL. All rights reserved.</p>
                                </div>
</div>
