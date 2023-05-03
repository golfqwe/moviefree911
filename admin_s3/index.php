<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<style>

/*Fonts*/
@import 'https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap';


::selection {
  background: #ffb7b7; /* WebKit/Blink Browsers */
}
::-moz-selection {
  background: #ffb7b7; /* Gecko Browsers */
}
* { 
  -moz-box-sizing: border-box; 
  -webkit-box-sizing: border-box; 
  box-sizing: border-box; 
}
:focus {outline:none}
/*Reset*/
body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, 
pre, form, fieldset, input, textarea, p, blockquote, th, td { 
  padding:0;
  margin:0;}
body,input{
  font-family: 'Prompt', sans-serif;
  font-size:18px;
  color:#4c4c4c;
}
body{
  background-color:#292931;
  background:url(img/bg.jpeg)  no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
form{
  margin: 10px 35px;
}
input{
  border:none;
}
a{
    text-decoration: none;
    color: rgb(255, 255, 255);
    
}
a:hover{
  color: rgba(255, 152, 0, 0.79);
  text-decoration: underline;
  
}
input[type=text], input[type=password] {
  width: 200px;
  height: 38px;
  border:1px solid #cbc9c9;
  padding-left:5px;
  margin-left:-5px;
  margin-top:3px;
  border-radius:0px 3px 3px 0px;
  -webkit-border-radius:0px 3px 3px 0px;
  -moz-border-radius:0px 3px 3px 0px;
}
input[type=submit]{
  width: 237px;
  height: 40px;
  margin-left:17px;
  border-radius:3px;
  background-color:#ae6a6a;
  color:#f8f8f8;
  border-radius:2px 2px 12px 12px;
  -webkit-border-radius:2px 2px 12px 12px;
  -moz-border-radius:2px 2px 12px 12px;
 
}
input[type=submit]:hover{
  background-color:#607d8b;
  color:#f8f8f8; 
  cursor:pointer;
  
}
#icon{
  background-color:#F4F4F4;
  color:#625864;
  display:inline-block;
  font-size:14px;
  padding-top:10px;
  padding-bottom:7px;
  width:40px;
  margin-left: 15px;
  margin-bottom:20px;
  text-align:center;
  border-top:solid 1px #cbc9c9;
  border-bottom:solid 1px #cbc9c9;
  border-left:solid 1px #cbc9c9;
  border-radius:3px 0 0 3px;
  -webkit-border-radius:3px 0 0 3px;
  -moz-border-radius:3px 0 0 3px; 
}
.wrapper{
  margin:50px auto;
  width: 343px; 
  height: 280px; 
  border-radius:5px;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
}
.wrapper h1{
  font-family: 'Prompt', sans-serif;
  color:#f4f4f4;
  letter-spacing:8px;
  text-align:center;
  padding-top:5px;
  padding-bottom:5px;
}
.wrapper hr{
  opacity:0.2;
  
}
.crtacc{
  margin-left:0px;
}
</style></head>

<body>
<table  class="wrapper animated bounce" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100"></td>
  </tr>
  <tr>
    <td><table width="450" border="0" align="center" cellpadding="0" cellspacing="2" >
      <tr>
        <td height="32" align="center" style="color: #FFFFFF;"><h2>ระบบจัดการข้อมูลเว็บไซต์</h2> 
          <h4 align="center" style="color: #FFFFFF;">ดูหนังออนไลน์</h4><hr>
        </td>

      </tr>

      <tr>
        <td ><form id="form1" name="form1" method="post" action="login.php">
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
          <table width="430" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" style="color: #FFFFFF;"><font size="3">Email</font></td>
            </tr>
            <tr>
              <td align="left"><input name="email" type="text" class="input" id="email" onblur="if(this.value==''){this.value='Email';}" onclick="if(this.value=='Email'){this.value='';}" value="Email" style="width:100%;"/></td>
            </tr>
            <tr>
              <td align="left" style="color: #FFFFFF;"><font size="3">Password</font></td>
            </tr>
            <tr>
              <td align="left"><input name="pass" type="password" class="input" id="pass" onblur="if(this.value==''){this.value='Password'; }" onclick="if(this.value=='Password'){this.value='';}" value="Password" style="width:100%;"/></td>
            </tr>
            <tr>
              <td align="center"><input type="submit" name="Submit" value="เข้าสู่ระบบ" /></td>
            </tr>


          </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>

        </form>
          <div class="crtacc" align="center"style="color: #FFFFFF;"><a href="../index.php">กลับสู่หน้าหลัก</a> MovieV5 <hr></div>
        </td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
