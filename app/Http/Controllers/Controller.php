<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function w($fileName, $txt) {
        $file = fopen("/var/www/dodomogu/mhrise/src/data/".$fileName, "w");

        fwrite($file, $txt);

        fclose($file);
    } 
}
