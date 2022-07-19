<?php
 
namespace App\Enums;

enum Type: string
{
    case PDF = 'pdf';
    case CODE = 'code';
    case URL = 'url';
}
