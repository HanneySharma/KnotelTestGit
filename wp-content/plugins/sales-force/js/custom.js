
$(document).ready(function (){
    /*
     * Fucntion for validate set sales force settings page. 
     * 
     */
    if($('#add_sales_form').length!==0){
            $("#add_sales_form").validate({   
        rules: {
           security_key: {
               required: true   
           },
           email: {
               required: true
               
           },
           password:{
             required: true
             
           }
           
       },
       messages: {
           security_key:{
               required: "Please enter region name."
           },
           email:{
                required:"Please enter email address." 
           },
           password:{
                required:"Please enter password."
           }
       }      
    });
        
    }
    if($('#add_frmlocation').length!==0){
            
    //Function for validate locations page. 
    $("#add_frmlocation").validate({
        rules: {
            location: {
                required: true   
           }
        },
        message:{
            location:{
                required: "Please enter location name."
            }
       }
   }); 
        
    }

    
    
   
  
});   
 