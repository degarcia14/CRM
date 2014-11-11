  <?php
    $server="dcprimario\sqlexpress";
    $connectinfo=array("Database"=>"dbConsola",
                  "UID"=>"sa", "PWD"=>"q1w2e3r4.","CharacterSet"=>"UTF-8");
    $connectinfo2 = array('Database' => "dbFacturacionUniversal" ,
                  "UID" => "sa", "PWD"=>"q1w2e3r4.","CharacterSet"=>"UTF-8" );
    $connectinfo3 = array('Database' => "generica_erp",
                  "UID" => "sa", "PWD" => "q1w2e3r4.", "CharacterSet"=>"UTF-8" );
    //connect to DB
    $db=sqlsrv_connect($server,$connectinfo);
    $db2=sqlsrv_connect($server,$connectinfo2);
    $db3=sqlsrv_connect($server,$connectinfo3);


    if(!$db || !$db2 || !$db3)
    {
      echo "No hay conexion con la base de datos.<br/>";
      die(print_r(sqlsrv_errors(), true));
    }
  ?>
