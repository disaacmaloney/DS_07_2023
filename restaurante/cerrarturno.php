<?php
    session_start();

    unset($_SESSION['clienteVenta']);
    unset($_SESSION['listaVentas']);

    header("Location: index.html");