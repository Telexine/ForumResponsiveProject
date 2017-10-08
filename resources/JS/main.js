 
 
 var jQueryScript = document.createElement('script');  
 jQueryScript.setAttribute('src','resources/JS/jquery-3.2.1.min.js');
 document.head.appendChild(jQueryScript);


        function notification(msg) {
            'use strict';
            var snackbarContainer = document.querySelector('#demo-toast-example');
            
              var Msgdata = {message: msg,timeout: 3000};
              snackbarContainer.MaterialSnackbar.showSnackbar(Msgdata);
     };
     
     function appendList(){
      
		  
		  Title="title";content="nickname";href="content";
	   //GET WHERE to append post
       const listelement = document.querySelector('#SearchList');
        
		//create element 
	   const sli = document.createElement('li');
	   const sSpan = document.createElement('span');
		 const si = document.createElement('i');
	   const sTitle = document.createElement('span');
	   const scontent = document.createElement('span');
		  
	   // add class 

	   sli.className = " mdl-list__item mdl-list__item--three-line";
       sSpan.className = "mdl-list__item-primary-content";
       si.className = "material-icons mdl-list__item-avatar";
       sTitle.className = "";
       scontent.className = "mdl-list__item-text-body ";
		 
	   //int metadata 
       sTitle.textContent = Title;
       scontent.textContent = content;
  
	   //append Messgage

	   sli.appendChild(sSpan);
	   sSpan.appendChild(si);
       sSpan.appendChild(sTitle);
       sSpan.appendChild(scontent);
	    
         listelement.appendChild(sli);
	  

     }

// REGISTER
      function register(){
        // validate
        if(!validate('require')){return;}
        // password check 
        pw1 = document.getElementById('Password2').value;
        pw2 = document.getElementById('Password').value;
        if(pw1!=pw2){
            //pass word is not the same / alert something
            notification('Password is not match');
           
            return;
        }
    
        // All clear  เขียนลง DB
        
            let name = document.getElementById('Name').value;
 
            let Username = document.getElementById('username').value;
            let password = md5(document.getElementById('Password').value);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let response =parseInt(this.responseText);
                        if(response==200){
                           
                            notification("success");
                            //fade out
                            $('#regisOption').removeClass(" fadepopIN"); 
                            $('#regisOption').addClass(" fadepopOut"); 
                location.reload(); // reload
                        }else if(response==406)
                          
                              notification("Response : This Username "+ Username +" Already taken please try again");
                              // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                           
                           }
                        };
                
                 
                xmlhttp.open("GET","resources/PHP/register.php?name="+name+"&Username="+Username+"&password="+password,true);
                xmlhttp.send();
      }

      function logout(){
        
        
        
        $.post("resources/PHP/logout.php",
        { },
        function(data,status){
                  if(status!='success'){  
                                notification("can't log out ");  
                               }
                            else{
                                notification("Loging you out"); //จะขึ้น Modal, Breadcrumb
                                blurAll();
                                setTimeout(function(){
                                    location.reload();
                                },2000); 
                            }
        });
        
        
        }

function hideAll(){ // โชว Create Post
	$('#CreatePostBox').removeClass( " show " ).addClass( " hide " );
	$('#RegisterBox').removeClass( " show " ).addClass( " hide " );
	$('#backdrop').removeClass( " show " ).addClass( " hide " );
    $('#SearchBox').removeClass( " show " ).addClass( " hide " );
    removeBlurAll();
}
function blurAll(){
    
    $('#main').addClass('blurTransition');
    $('#wrapper').addClass('blurTransition');
}
function removeBlurAll(){
    $('#main').removeClass('blurTransition');
    $('#wrapper').removeClass('blurTransition');
    
}
function PopRegisterPost(){  // โชว Resgist  Post
    blurAll();
	$('#RegisterBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	
}
function PopSearch(){  // โชว Resgist  Post
    blurAll();	 
	$('#SearchBox').removeClass( " hide " ).addClass( " show " );
	$('#backdrop').removeClass( " hide " ).addClass( " show " );
	
}
function removeList(){
  $('#SearchList').empty();
}
function tagToList(){
  removeList();
  for(i=1;i<tagged.length;i++){

      
  }
}

$(function(){
  $('.hot').carousel({
	speed: 800,
	autoRotate: 4000,
    visible: 4,
    itemMinWidth: 270,
    itemEqualHeight: 370,
    itemMargin: 10,
  });
  $('.res').carousel({
    visible: 9,
    itemMinWidth: 120,
    itemEqualHeight: 370,
    itemMargin: 10,
  });
	
  	$('.hot').on("initCarousel", function(event, defaults, obj){
		// Hide controls
		$('#'+defaults.navigation).find('.previous, .next').css({ opacity: 0 });
		// Show controls on gallery hover
		// #gallery-07 wraps .crsl-items and .crls-nav
		// .stop() prevent queue
		$('#w').hover( function(){
			$(this).find('.previous').css({ left: '-5px' }).stop(true, true).animate({ left: '0px', opacity: 1 })
			$(this).find('.next').css({ right: '-10px' }).stop(true, true).animate({ right: '-5px', opacity: 1 });
		}, function(){
			$(this).find('.previous').animate({ left: '-5px', opacity: 0 });
			$(this).find('.next').animate({ right: '-10px', opacity: 0 });
		});
		$('#ww').hover( function(){
			$(this).find('.previous').css({ left: '-5px' }).stop(true, true).animate({ left: '0px', opacity: 1 })
			$(this).find('.next').css({ right: '-10px' }).stop(true, true).animate({ right: '-5px', opacity: 1 });
		}, function(){
			$(this).find('.previous').animate({ left: '-5px', opacity: 0 });
			$(this).find('.next').animate({ right: '-10px', opacity: 0 });
		});
	});
});

function validate(classNa){
    let check = document.getElementsByClassName(classNa);
     let len = check.length;
     let valid = true;
     for(var i=0;i<len;i++) {
       if (check[i].value.trim() ==='')
       {    

           let obj = check[i].id;
 
           $("#"+obj).addClass(" required");  // กล่องแดง
            $("#"+obj).addClass(" error");    // สั่น
            $("#"+obj+"_error").removeClass("hideErrorMessage");
              setTimeout(function() {
              $("#"+obj).removeClass("error");
            }, 300);
            valid= false;
            
          //alert('required Field '+check[i].name); //เดวเราทำ js เพิ่ม เราไม่ควรใช้  alert
          notification('required Field '+check[i].name);
           
       }
       else{
        let obj = check[i].id;
        $("#"+obj).removeClass(" required");  // กล่องแดง
        $("#"+obj+"_error").addClass(" hideErrorMessage");

       }
 
      
     }
    
    return valid;

}