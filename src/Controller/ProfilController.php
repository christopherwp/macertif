<?php

namespace App\Controller;



use App\Repository\CommandeRepository;
use App\Repository\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index( CommandeRepository $commandeRepository, FactureRepository $factureRepository): Response
    {   
        $user = $this->getUser();
        
    
        return $this->render('profil/index.html.twig', [
            'user' => $user,
            
           
        ]);
    }
    #[Route('/facture', name: 'app_facture')]
    public function index2( CommandeRepository $commandeRepository, FactureRepository $factureRepository): Response
    {   
        $user = $this->getUser();
        $facture = $factureRepository->findBy(['users' => $this->getUser()->getId()]);
        $commande = $commandeRepository->findAll();
    
        return $this->render('profil/facture.html.twig', [
            
            'facture' => $facture,
            'commande' => $commande,
           
        ]);
    }
}
