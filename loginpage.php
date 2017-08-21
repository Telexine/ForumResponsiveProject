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
                 
                </td>


            </tr>

            <tr>
                 <td width="102">Avatar
                </td>
                <td width="144"> 
              
                 <input id="UploadAvatar"     name = "avatar" type="file" value="Upload" accept="image/*"/> <!--  TAE   -->
                </td>

                
            </tr>
            
            	 <tr>
            	<td>Username
                </td>
                <td> 
                 <input class="require" ID="username" name="username" type="text"> <!--  TAE   -->
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
                 <input onclick = 'registerValidate();' id="Register"type="button" value="Sign up"/>  <!--  TAE   -->
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
                 <input name="username" type="text">
                </td>
            </tr>
             <tr>
            	<td>Password
                </td>
                <td> 
                 <input name="password" type="text">
                </td>
            </tr>
            <tr>
            <td> 
                </td>
             <td align="right"> 
                 <input type="button" value="Log in"/>
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


// REGISTER

  function registerValidate(){
     let check = document.getElementsByClassName('require');
     let len = check.length;
     for(var i=0;i<len;i++) {
       if (check[i].value ==='')
       {
          alert('required Field '+check[i].name); //เดวเราทำ js เพิ่ม เราไม่ควรใช้  alert
          return false;
       }; 
     };
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


//end tae -------

</script>
</html>
