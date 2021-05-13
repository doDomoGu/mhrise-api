<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $jsonPath = "/var/www/dodomogu/mhrise/src/data/json/";

    public $imageTargetPath = "/var/www/dodomogu/mhrise/src/data/images/";
    public $imageOriginPath = "/var/www/dodomogu/mhrise-api/app/Data/图片/";
    

    public function w($filePath, $txt) {
        $file = fopen($filePath, "w");

        fwrite($file, $txt);

        fclose($file);
    }

    public function i($originFilePath, $targetFilePath) {
        copy($originFilePath,$targetFilePath);
    }
}
