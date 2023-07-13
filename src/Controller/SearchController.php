<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('admin/search', name: 'app_search')]
    public function index(Request $request, UserRepository $userRepository): Response {

        $recherche = $request->query->get('search');

        if (!empty($recherche)) {
            $resultats = $userRepository->chercher($recherche);
        } else {
            $resultats = $userRepository->findAll();
        }
        //dd($recherche,$resultats);
        
        return $this->render('search/index.html.twig', [
            'resultats' => $resultats,
        ]);
    }
}
