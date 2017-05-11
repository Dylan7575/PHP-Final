<?PHP

include_once("./CAS-1.3.4/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas.nau.edu',443,'/cas',true);
    // SSL!
    phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
    session_destroy();
    phpCAS::logout();
    session_start();
    $_SESSION=array();
    session_destroy();
    ?>