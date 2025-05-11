<?php   
   //Remote
   
     define("SERVER","localhost");
     define("USER","root"); //raqeebul Fahim
     define("DATABASE","project_pharmacy_db");
     define("PASSWORD","");
     define("PORT","3306");

   //Local
   
    //define("SERVER","localhost");
    //define("USER","root");//rajib
    //define("DATABASE","hosting");
    //define("PASSWORD","");

    $db = new mysqli(SERVER,USER,PASSWORD,DATABASE,PORT);
    $tx="";
    

?>