$(document).ready(function(){

	$(".test-form").submit(function(e){
		e.preventDefault();

		var input = document.getElementsByClassName("required");
        
        var temp=[];

        $(input).each(function(i){
                    
            if( $(this).val().trim() == ''  ||  $(this).val().trim() == null )
            {
                if(this.nextSibling.nodeName == "SMALL")
                {
                    this.nextSibling.remove();
                }
                    //////////
                    var link = $(this).parent("div").find("label");

                window.scrollTo(0,0);
                 $(this).addClass("border-danger");
                 $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>"+link.text()+" is Required</small>").insertAfter(this);
            }
            else
            {
                temp[i] = $(this).val().trim();
                 if(this.type == "email")
                        {
                            validate_email(this);
                        }
               
            }


    	 });


        if(temp.length == input.length && $(".required-notice").length == 0)
            {
                $.ajax({
                    type:"POST",
                    url:"insert.php",
                    data : new FormData(this),
                    contentType:false,
                    processData:false,
                    success:function(result)
                    {
                    	if($.trim(result) == "success")
                        {
                            

                             setTimeout(function() {
                            location.reload();
                        }, 2000);
                                        

                             toastr.options.timeOut = 2500; // 1.5s
                             toastr.success('Data Add Successfully');

                        }
                        else if($.trim(result) == "Email Id is already Exist")
                        {
                                var email = document.getElementsByClassName("email-val");
                                $(email).addClass("border-danger");
                                $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i> Email is already exist !</small>").insertAfter(email);
                                 
                                toastr.options.timeOut = 2000; // 1.5s
                                toastr.error('Email is already Exist !');
                        }
                        else
                        {
                        	alert(result);
                        }
                    }
           
                });
            }


            // remove require message on input
          $(input).each(function(){
            $(this).on("input",function(){

                if(this.nextSibling.nodeName == "SMALL")
                {
                    $(this).removeClass("border-danger");
                    this.nextSibling.remove();
                }
                });
            });

           function validate_email(input)
            {
            var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                if(!reg.test(input.value))
                {
                    if(input.nextSibling.nodeName == "SMALL")
                            {
                                input.nextSibling.remove();
                            }

                            $(input).addClass("border-danger");
                            $("<small class='text-danger required-notice'><i class='fas fa-exclamation-triangle'></i>Enter a valide email id</small>").insertAfter(input);
                }
            }
	});




	$(".delete").on("click",function(e){
		e.preventDefault();
		
		var id = $(this).val();

		var result = confirm("Delete this record !");
		  if (result == true) {
		    
		  		$.ajax({
		  			url:"delete.php",
		  			type:"POST",
		  			data:{
		  				id:id
		  			},
		  			success:function(result)
		  			{
		  				if($.trim(result) == "delete")
                        {
                            
                             setTimeout(function() {
                            location.reload();
                       		 }, 2000);
                                        

                             toastr.options.timeOut = 2500; // 1.5s
                             toastr.success('Data delete Successfully');

                        }
                        else
                        {
                        	alert(result);
                        }
		  			}
		  		});

		  }
       
	});


});


$(document).ready(function(){

   $(".edit").click(function(){
     
      $("#confirm").modal('show');

      $.ajax({
         type:"POST",
         url:"updatedata.php",
         data:{
           id:$(this).attr("value"),
         },
         success:function(response){
           $(".form-contain").html(response);

           $(".update-form").submit(function(e){
             e.preventDefault();
                $.ajax({
                     type:"POST",
                     url:"finalupdate.php",
                     data: new FormData(this),
                  processData: false,
                  contentType: false,
                  cache: false,
                     success:function(response){
                       if(response.trim() == "success"){
                         window.location.reload();
                       }
                       else{
                        alert(response);
                       }
                     }
                });
           });
         }
      });

   });
});