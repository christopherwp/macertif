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
         
      $cookie = new Cookie('moncookie', //Nom cookie
                     'Red', //Valeur
                      strtotime('tomorrow'), //expire le
                      $_SERVER['PATH_INFO'], //Chemin de serveur
                      $_SERVER['HTTP_HOST'], //Nom domaine
                     true, //Https seulement
                     true);
                     $res = new Response();
                     $res->headers->setCookie( $cookie );
                     $res->send();           
                       
        return $this->render('home/index.html.twig', [
            'produits' => $produitRepository->findAll(),
            'cookie' => $cookie,
            
        ]);
    }
}
