<?php

namespace app;

/**
 * Nela contém funções diversas.
 *
 * @author EU
 */
class Functions {
    
    public function convertDataToBR($data)
    {
        return date('d-m-Y', strtotime($data));
    }
}
