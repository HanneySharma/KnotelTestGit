
$(document).ready(function (){
    /*
    * Fucntion for validate region or state form.
    * 
    */
    if($('#add_marker_id').length!==0){
        $("#add_marker_id").validate({    
            rules: {
               title: {
                   required: true   
               },
               link: {
                   required: true

               },
               latitude:{
                 required: true,
                 number:true
               },
               longitude:{
                 required: true,
                 number:true  
               },
               region:{
                   required:true    
               },
               address:{
                 required:true  
               }

           },
            messages: {
                title:{
                    required: "Please enter title."
                },
                longitude:{
                     number: "Longitude value should be in number",  
                     required:"Please enter longitude value." 
                },
                latitude:{
                     number: "Latitude value should be in number",  
                     required:"Please enter latitude value." 
                },
                zoom:{
                     number: "Zoom value should be in number",  
                     required:"Please enter map zoom value." 
                },
                link:{
                    required:"Please enter link." 
                },
                region:{
                    required:"Please select region." 
                },
                address:{
                    required:"Please enter address." 
                }
            }      
        });    
    }
    
    
  
});   
 