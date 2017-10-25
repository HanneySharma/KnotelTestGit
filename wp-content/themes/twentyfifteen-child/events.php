<?php
/**
 * Template Name: Upcomingsdads Eventssdasdasd
*/
?>
<!DOCTYPE html>
<!-- saved from url=(0024)https://knotel.com/terms -->
<html>
<head>
<?php wp_head();  ?>
      <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-46641860-13', 'auto');
    ga('send', 'pageview');
      </script></head>
<?php


//**************START Code for read upcoming events.***********//
/*$url = "https://knotel.com/publications/upcoming10Events";
//$url = "https://knotel.com/publications/past10Events";
//Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
//Will dump a beauty json :3
//var_dump(json_decode($result, true));
$response = json_decode($result, true);
$i = 0;
foreach($response as $key => $events){
    foreach($events as $event){
        print_r($event);
        //echo $event['_id']."<br>";
        //die;
    }
}*/



$data = array("2pA3bFuzjfY3aBBw2", "guests" => array('name' => 'deep','email' =>'pdeep@teqmavens.com','submitterName' => 'Honney','submitterEmail' => 'shanney@teqmavens.com','shouldSendMailToGuest' => true,'personalMsg' => 'testing')); 


//$urlbuk = http_build_query($data); 
//echo "https://dev.knotel.com/methods/eventRSVP?".$urlbuk;
//die;

//$data_string = json_encode($data);
$data_string = "";
//echo $data_string;
$ch = curl_init('https://dev.knotel.com/methods/eventRSVP');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
/*curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);*/                                                                                                                   
$result = curl_exec($ch);
print_r($result);

//**************END Code for read upcoming events.***********//


//**************START Code for RSVP .***********//
/*There's eventRSVP method for that available as POST REST API endpoint:
https://knotel.com/methods/eventRSVP
Arguments are passed as JSON or query-encoded data in the message body. 

argumentsSchema: new NodeSimpleSchema({
  0: Schemas.MongoId,
  1: Object,
  '1.guests': Array,
  '1.guests.$': { type: Object, optional: true },
  '1.guests.$.name': String,
  '1.guests.$.email': { type: NodeSimpleSchema.RegEx.Email, optional: true },
  '1.submitterName': String,
  '1.submitterEmail': NodeSimpleSchema.RegEx.Email,
  '1.shouldSendMailToGuest': Boolean,
  '1.personalMsg': { type: String, optional: true },
}),
//Where 0 - is event id
//You can try testing it on dev.knotel.com with real emails (please use your emails :)*/








//**************END Code for RSVP .***********//






?>
<?php wp_footer(); ?>
</html>
