<?php

namespace App\Services;

use App\Models\Orders;
use Milon\Barcode\DNS1D;


class BarcodeService
{
    public function generateBarcode(string $orderCode)
    {
        $barcode = new DNS1D();
        $png = $barcode->getBarcodePNG($orderCode, 'C128');
        return 'data:image/png;base64,' . $png;
    }
}
