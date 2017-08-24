<?php

require_once('resources/PHP/func.php');    // TAE




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="sighup" style="width:1000px; float:left; padding-left:80px; padding-top:50px;">
        <table>
         <form>
            <tr>
            	<td width="102">NickName
                </td>
                <td width="144"> 
                 <input class="require"  ID="Name" name="Nick Name" type="text">  <!--  TAE   -->
                 <div id="Name_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>


            </tr>

            <tr>
                 <td width="102">Avatar
                </td>
                <td width="144"> 
                 <input   id="avatarPath"   name = "avatar" type="file" value="Upload" accept="image/*"/>   <!--  TAE   -->
                 <div id="avatar_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>

                
            </tr>
            
            	 <tr>
            	<td>Username
                </td>
                <td> 
                 <input class="require" ID="username" name="username" type="text"> <!--  TAE   -->
                 <div id="username_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>
            </tr>
             <tr>
            	<td>Password
                </td>
                <td> 
                 <input class="require" id ='Password' name="password" type="password"> <!--  TAE   -->
                
                </td>
            </tr>
             <tr>
            	<td>Confirm Password
                </td>
                <td> 
                 <input class="require" id ='Password2'name="passwordconfirm" type="password"> <!--  TAE   -->
                 <div id="Password_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>
            </tr>
            	 <tr>
            	<td>
                </td>
                <td>
                </td>
                  <td>
                </td>
                <td> 
                 <input onclick ="register();" id="Register"type="button" value="Sign up"/>  <!--  TAE   -->
                </td>
            </tr>
           
             </form>
        </table>
   
</div>
<div id="login" style="padding-top:80px; padding-left:50px;">
 <table >
         <form>
			 <tr>
            	<td>Username
                </td>
                <td> 
                 <input id="Login_ID" name="username" class="reqLog" type="text">  <!-- TAE  -->
                 <div id="Login_ID_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>
            </tr>
             <tr>
            	<td>Password
                </td>
                <td> 
                 <input id="Login_Pass" name="password" class="reqLog" type="text"> <!-- TAE  -->
                 <div id="Login_Pass_error" class="hideErrorMessage errmsg">Require</div><!--  TAE   -->
                </td>
            </tr>
            <tr>
            <td> 
                </td>
             <td align="right"> 
                 <input type="button" onclick = 'Loginpage();' value="Log in"/>
                </td>
            </tr>
		</form>
 </table>
</div>
</body>


<script src="resources/JS/MD5.js">//TAE JS สำหรับแปลง เป็น MD5 </script> 
<script src="resources/JS/jquery-3.2.1.min.js"> </script> 
<script>
// --- TAE ------

//Validate 


function validate(classNa){
    let check = document.getElementsByClassName(classNa);
     let len = check.length;
       console.log(check);
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
         

          //alert('required Field '+check[i].name); //เดวเราทำ js เพิ่ม เราไม่ควรใช้  alert


           
       }
       else{
        let obj = check[i].id;
        $("#"+obj).removeClass(" required");  // กล่องแดง
        $("#"+obj+"_error").addClass(" hideErrorMessage");

       }
     }


}
// REGISTER

  function register(){

    if(!validate('require')){return;}
    // password check จะทำเป็น JS pending


    // All clear  เขียนลง DB

        let name = document.getElementById('Name').value;
        let avatarURL = document.getElementById('UploadAvatar').value; // เดี๋ยวทำ
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
                        alert("success"); //จะขึ้น Modal, Breadcrumb
                    }else if(response==406){
                        alert("Response : This Username "+ Username +" Already taken plz try again"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                }
            };
             
            xmlhttp.open("GET","resources/PHP/register.php?name="+name+"&avatarURL="+avatarURL+"&Username="+Username+"&password="+password,true);
            xmlhttp.send();
  }


//REGISTER BUTTON 


// Login 
function Loginpage(){

   validate('reqLog') 

    let Username = document.getElementById('Login_ID').value;
    let password = md5(document.getElementById('Login_Pass').value);

    
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
                        alert("Login success"); //จะขึ้น Modal, Breadcrumb
                    }else if(response==406){
                        alert("Response : Username or password are incorrect"); // ถ้า  Fail จะขึ้น Modal, Breadcrumb
                                                        //  ได้ จะ ขึ้นเหมือนกัน และก็ redirect
                       }
                }
            };
             
            xmlhttp.open("GET","resources/PHP/login.php?Username="+Username+"&password="+password,true);
            xmlhttp.send();


}
// end login 


</script>
<style>

.error {
    position: relative;
    animation: shake 0.5s cubic-bezier(0, 1.8, 0.5, 1.8) 0s 2;
    animation-iteration-count: 3;
}
.required{ 
    border:1px solid red;
}
@keyframes shake {
    0% {
        left: 0px;
      }
      20% {
        left: 8px;
      }
      40% {
        left: -4px;
      }
      60% {
        left: 4px;
      }
      100% {
        left: 0px;
      }
}

.hideErrorMessage{
    opacity: 0;
}

.errmsg
{
    color:red;
}

body {
  font-family: "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  }
</style>
<!-- //end tae  -->


</html>
