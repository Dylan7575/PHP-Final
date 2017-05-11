<?php
require_once 'CAS-1.3.4/CAS.php';
// Enable debugging
phpCAS::setDebug();
// Enable verbose error messages. Disable in production!
phpCAS::setVerbose(true);
// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, "cas.nau.edu", 443, "/cas");
// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);
// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();
// force CAS authentication
session_start();
if(phpCAS::checkAuthentication()==1){
    $_SESSION['auth']="true";
}
else{
    $_SESSION['auth']="false";
}
$auth=$_SESSION['auth'];
$user=$_SESSION['name'];
?>
<script>
    var init= false;
    var username= '<?php echo $user;?>';
    var auth = '<?php echo $auth;?>';
    if (init == false){
        localStorage.setItem('user',username);
        localStorage.setItem('auth',auth);
    in = true;
    }
</script>
