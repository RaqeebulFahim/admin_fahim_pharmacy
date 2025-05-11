<?php   
   //Remote
   
    //  define("SERVER","localhost");
    //  define("USER","raqeebulfahim_fahim"); //raqeebul Fahim
    //  define("DATABASE","raqeebulfahim_project_pharmacy_db");
    //  define("PASSWORD","017+F@h1m");
    //  define("PORT","3306");

   //Local
   
    define("SERVER","localhost");
    define("USER","root");
    define("DATABASE","project_pharmacy_db");
    define("PASSWORD","");
    define("PORT","3306");

    $db = new mysqli(SERVER,USER,PASSWORD,DATABASE,PORT);
    $tx="";
    

?>