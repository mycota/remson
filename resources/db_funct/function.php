<?php 

function mysqli($data){

  global $con;

  return mysqli_real_escape_string($con,$data);

}
function uniqids() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

$jobNumber = 'JOB-'.uniqids();


function confirmQuery($result){
      
      global $con;
    
    if (!$result) {
      die("Query Failed !!" .mysqli_error($con));
    }
}

//Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function get_ip_address()
  {
    if (isset($_SERVER)) {
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]) && ip2long($_SERVER["HTTP_X_FORWARDED_FOR"]) !== false) {
              $ipadres = $_SERVER["HTTP_X_FORWARDED_FOR"];
  } elseif (isset($_SERVER["HTTP_CLIENT_IP"])  && ip2long($_SERVER["HTTP_CLIENT_IP"]) !== false) {
                $ipadres = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $ipadres = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR') && ip2long(getenv('HTTP_X_FORWARDED_FOR')) !== false) {
                $ipadres = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP') && ip2long(getenv('HTTP_CLIENT_IP')) !== false) {
                $ipadres = getenv('HTTP_CLIENT_IP');
            } else {
                $ipadres = getenv('REMOTE_ADDR');
            }
        }
        return $ipadres;
    }


function logs($userID, $user, $action){
      global $con;

  $userid = mysqli_real_escape_string($con,$userID);
  $logaction = mysqli_real_escape_string($con,$action);
  $ips = get_client_ip()." | ".get_ip_address();

  $insert_query = mysqli_prepare($con,"INSERT INTO tbl_logs (userID, user_name, log_action,ipaddress) VALUES(?,?,?,?)");
  mysqli_stmt_bind_param($insert_query,"dsss", $userid, $user, $logaction,$ips);
  mysqli_stmt_execute($insert_query);
  confirmQuery($insert_query);
  
}

function encrypt($pas){

  $hashformat = "$2y$10$";
    $salt = "iloveyouGodcositisyou1";
    $hashsalt = $hashformat.$salt;
    $pass = crypt($pas,$hashsalt);

    return $pass;
    }


function pass($pwd){
$error='';
if( strlen($pwd) < 10 ) {
$error .= "Password too short! 
";
}

if( !preg_match("#[0-9]+#", $pwd) ) {
$error .= "Password must include at least one number! 
";
}

if( !preg_match("#[a-z]+#", $pwd) ) {
$error .= "Password must include at least one letter! 
";
}

if( !preg_match("#[A-Z]+#", $pwd) ) {
$error .= "Password must include at least one CAPS! 
";
}

if( !preg_match("#\W+#", $pwd) ) {
$error .= "Password must include at least one symbol! 
";
}

if($error){
return "Password validation failure(your choise is weak): $error";
}
}
?>
<!-- Print function -->
<script type="text/javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>