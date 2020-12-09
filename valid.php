<?php
    session_start();

    // obtener fecha y días 
    if ($_GET["date"] != "" && $_GET["days"] != "" && $_GET["days"] >= 0){
        // sumar días
        $current_date = $_GET["date"];
        $days = $_GET["days"];
        $holidates = ["08-12-2020, 24-12-2020", "25-12-2020", "31-12-2020", "01-01-2021"];

        for ($i = 1 ; $i <= $days ; $i++){
            $add_days = strtotime($current_date."+".$i." days");
            $new_date = date("d-m-Y",$add_days);

            $in_array_holiday = in_array ( $new_date, $holidates );
            
            if ($in_array_holiday){
                $days = $days + 1;
            }
        }
        echo(
            "<p>
                La fecha resultante es: ".$new_date."
            </p>"
        );

        $size_array = count($_SESSION['results']);
        if ($size_array != 0){
            $_SESSION["results"][$size_array + 1] = $new_date;
        }else{
            array_push($_SESSION["results"], $new_date);
        }

        // dates calculates
        print_r($_SESSION["results"]);
    }else{
        echo("
            <h1> No es posible calcular la fecha </h1>
        ");
    }
?>