<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitcategorieController extends AbstractController
{
    #[Route('/produitcategorie/{id}', name: 'app_produitcategorie')]
    public function index(Categorie $categorie,ProduitRepository $produitRepository): Response
    {

        $produit_cat = $produitRepository->findBy([
         'categories' => $categorie   
        ]);
        return $this->render('produitcategorie/index.html.twig', [
            'produit_cat' => $produit_cat,
        ]);
    }
}
