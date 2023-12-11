<?php
session_start();

   if(isset($_SESSION['listaVentas'])){


    $total_platos_con_descuento = 0;
    $total_platos_sin_descuento = 0;

    $total_subtotal = 0;
    $total_descuento = 0;
    $total_venta = 0;
    $total_venta_con_descuento = 0;
    $total_venta_sin_descuento = 0;
    $slistaVenta = $_SESSION['listaVentas'];
    foreach($slistaVenta["records"] as $venta)
    {
        
        $total = $venta["cantidad"] * $venta["precio"];
        $total_subtotal = $total_subtotal + $total;
        $descuento = (number_format($venta["precio"], 2) * 0.20) * $venta["cantidad"];
        
        if($venta["esJubilado"] == 0)
        {
            $total_platos_sin_descuento = $total_platos_sin_descuento +1;
            $total_venta = $total_venta + $total;
            $total_venta_sin_descuento = $total_venta_sin_descuento + $total;
        }
        else
        {
            $total_platos_con_descuento = $total_platos_con_descuento +1;
            $total_descuento = $total_descuento + $descuento;
            $total_venta = $total_venta + $total - $descuento;
            $total_venta_con_descuento = $total_venta_con_descuento  + $total - $descuento;
        }
        
    }

        $arrVentas = array(
            "ventas" => $_SESSION['listaVentas'],
            "total_platos_con_descuento" => $total_platos_con_descuento,
            "total_platos_sin_descuento" => $total_platos_sin_descuento,
            "subtotal" => $total_subtotal,
            "total" => $total_venta,
            "descuento" => $total_descuento,
       );

        $arrCli = array(
            "cliente" => $_SESSION['clienteVenta'],
            "ventas" => $arrVentas
        );

        if(isset($_SESSION['listaVentasTerminadas'])){
            $arrayVentas = $_SESSION['listaVentasTerminadas'];
        }else{
            $arrayVentas["records"] = array();

        }

        if(isset($_SESSION['SesTotaPlatosConDescuento'])){
            $_SESSION['SesTotaPlatosConDescuento'] = $total_platos_con_descuento + $_SESSION['SesTotaPlatosConDescuento'];
        }
        else{
            $_SESSION['SesTotaPlatosConDescuento'] = $total_platos_con_descuento;
        }

        if(isset($_SESSION['SesTotaPlatosSinDescuento'])){
            $_SESSION['SesTotaPlatosSinDescuento'] = $total_platos_sin_descuento + $_SESSION['SesTotaPlatosSinDescuento'];
        }
        else{
            $_SESSION['SesTotaPlatosSinDescuento'] = $total_platos_sin_descuento;
        }

        if(isset($_SESSION['SesSubtotal'])){
            $_SESSION['SesSubtotal'] = $total_subtotal + $_SESSION['SesSubtotal'];
        }
        else{
            $_SESSION['SesSubtotal'] = $total_subtotal;
        }

        if(isset($_SESSION['SesTotal'])){
            $_SESSION['SesTotal'] = $total_venta + $_SESSION['SesTotal'];
        }
        else{
            $_SESSION['SesTotal'] = $total_venta;
        }

        if(isset($_SESSION['SesDescuento'])){
            $_SESSION['SesDescuento'] = $total_descuento + $_SESSION['SesDescuento'];
        }
        else{
            $_SESSION['SesDescuento'] = $total_descuento;
        }

        if(isset($_SESSION['SesTotalConDescuento'])){
            $_SESSION['SesTotalConDescuento'] = $total_venta_con_descuento + $_SESSION['SesTotalConDescuento'];
        }
        else{
            $_SESSION['SesTotalConDescuento'] = $total_venta_con_descuento;
        }

        if(isset($_SESSION['SesTotalSinDescuento'])){
            $_SESSION['SesTotalSinDescuento'] = $total_venta_sin_descuento + $_SESSION['SesTotalSinDescuento'];
        }
        else{
            $_SESSION['SesTotalSinDescuento'] = $total_venta_sin_descuento;
        }
        
        array_push($arrayVentas["records"], $arrCli);
        $_SESSION['listaVentasTerminadas'] = $arrayVentas;
        unset($_SESSION['clienteVenta']);
        unset($_SESSION['listaVentas']);

        header("Location: menucomidas.php");
    }
