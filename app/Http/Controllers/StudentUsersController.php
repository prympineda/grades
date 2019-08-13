<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentUsersController extends Controller
{
    //

    
    public static function getGrade($i)
    {
        switch ($i) {
            case $i >= 0 && $i <= 3.99:
                return 60;
                break;
            
            case $i >= 4 && $i <= 7.99:
                return 61;
                break;
            
            case $i >= 8 && $i <= 11.99:
                return 62;
                break;
                
            case $i >= 12 && $i <= 15.99:
                return 63;
                break;
            
            case $i >= 16 && $i <= 19.99:
                return 64;
                break;

            case $i >= 20 && $i <= 23.99:
                return 65;
                break;
            
            case $i >= 24 && $i <= 27.99:
                return 66;
                break;
            
            case $i >= 28 && $i <= 31.99:
                return 67;
                break;
            
            case $i >= 32 && $i <= 35.99:
                return 68;
                break;

            case $i >= 36 && $i <= 39.99:
                return 69;
                break;

            case $i >= 40 && $i <= 43.99:
                return 70;
                break;

            case $i >= 44 && $i <= 47.99:
                return 71;
                break;

            case $i >= 48 && $i <= 51.99:
                return 72;
                break;

            case $i >= 52 && $i <= 55.99:
                return 73;
                break;
            
            case $i >= 56 && $i <= 59.99:
                return 74;
                break;

            case $i >= 60 && $i <= 61.59:
                return 75;
                break;

            case $i >= 61.6 && $i <= 63.19:
                return 76;
                break;

            case $i >= 63.2 && $i <= 64.79:
                return 77;
                break;

            case $i >= 64.8 && $i <= 66.39:
                return 78;
                break;
            
            case $i >= 66.4 && $i <= 67.99:
                return 79;
                break;
            
            case $i >= 68 && $i <= 69.59:
                return 80;
                break;
            
            case $i >= 69.6 && $i <= 71.19:
                return 81;
                break;
            
            case $i >= 71.2 && $i <= 72.79:
                return 82;
                break;
            
            case $i >= 72.8 && $i <= 74.39:
                return 83;
                break;

            case $i >= 74.4 && $i <= 75.99:
                return 84;
                break;

            case $i >= 76 && $i <= 77.59:
                return 85;
                break;

            case $i >= 77.6 && $i <= 79.19:
                return 86;
                break;

            case $i >= 79.2 && $i <= 80.79:
                return 87;
                break;

            case $i >= 80.8 && $i <= 82.39:
                return 88;
                break;

            case $i >= 82.4 && $i <= 83.99:
                return 89;
                break;   

            case $i >= 84 && $i <= 85.59:
                return 90;
                break;                     

            case $i >= 85.6 && $i <= 87.19:
                return 91;
                break;

            case $i >= 87.2 && $i <= 88.79:
                return 92;
                break;

            case $i >= 88.8 && $i <= 90.39:
                return 93;
                break;

            case $i >= 90.4 && $i <= 91.99:
                return 94;
                break;

            case $i >= 92 && $i <= 93.59:
                return 95;
                break;

            case $i >= 93.6 && $i <= 95.19:
                return 96;
                break;

            case $i >= 95.2 && $i <= 96.79:
                return 97;
                break;

            case $i >= 96.8 && $i <= 98.39:
                return 98;
                break;

            case $i >= 98.4 && $i <= 99.9:
                return 99;
                break;

            case 100:
                return 100;
                break;

            default:
                return $i;
                break;
        }
    }

}
