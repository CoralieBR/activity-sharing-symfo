<?php
namespace App\TwigExtension;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CustomFilters extends AbstractExtension{
    public function getFilters(){
        return [
            new TwigFilter('base64encode', [$this, 'encode']),
        ];
    }

    public function encode($value){
        return base64_encode($value);
    }
}
