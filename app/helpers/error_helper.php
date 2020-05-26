<?php
function attach_error($code, $message)
{
    if ($code == 'HY000' && strpos($message, 'Incorrect'))
    {
        return "Hay un valor incorrecto en los datos.";
    }
}