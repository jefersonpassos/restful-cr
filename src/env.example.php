<?php

//config for OCI8
if(getenv('SLIM_MODE') == 'development'){
    
    define('DB_HOST', "localhost:1521");
    define('DB_USER', 'dev_user');
    define('DB_PASS', 'pass');
}
elseif(getenv('SLIM_MODE') == 'production'){
    define('DB_HOST', "localhost:1521");
    define('DB_USER', 'prod_user');
    define('DB_PASS', 'pass');
}

?>