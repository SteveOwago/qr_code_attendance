<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class UserService.
 */
class UserService
{
    public function generateQrCode(Request $request,$userCode){
        $url = route('users.qr-code',[$userCode]); // Assuming you pass URL as a parameter

        
    }
}
