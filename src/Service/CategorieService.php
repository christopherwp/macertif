<?php

namespace App\Service;

use App\Repository\CategorieRepository;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;




Class CategorieService extends AbstractExtension{

    public function __construct(CategorieRepository $categorieRepository){
        $this->categorieRepository = $categorieRepository;
    }

    public function getFunctions() {

       return [ 
        new TwigFunction('cats', [$this, 'getcategories'])
    ];
    }

    public function getcategories() {
        return $this->categorieRepository->findAll();
    }

    
}