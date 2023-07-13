<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ProduitRepository $produitRepository): Response
    {   
         
          
        return $this->render('home/index.html.twig', [
            'produits' => $produitRepository->findAll(),
           
            
        ]);
    }
}
