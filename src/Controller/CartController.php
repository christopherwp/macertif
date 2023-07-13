<?php

namespace App\Controller;


use App\Service\CartService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/cart')]
class CartController extends AbstractController
{
    #[Route('/add/{id}', name: 'app_cart_add')]
    public function index($id,CartService $cartService): Response
    {   
         $cartService->add($id);

        //dd($panier);
        return $this->redirectToRoute("app_cart_show",[], Response::HTTP_SEE_OTHER);
    }


    #[Route('/show', name: 'app_cart_show')]
    public function show(CartService $cartService): Response
    {
       
        return $this->render('cart/index.html.twig', [
            'panier' => $cartService->show(),
            'total' =>$cartService->getTotalAll(),
            
        ]);
    }


    #[Route('/clear', name: 'app_cart_clear')]
    public function del(CartService $cartService): Response
    {

        $cartService->clear();

        return $this->redirectToRoute("app_produit_index",[], Response::HTTP_SEE_OTHER);
    }

    #[Route('/remove/{id}', name: 'app_cart_remove')]
    public function remove_all($id,CartService $cartService): Response
    {

        $cartService->remove_all($id);

        return $this->redirectToRoute("app_cart_show",[], Response::HTTP_SEE_OTHER);
    }

    #[Route('/removequantite/{id}', name: 'app_cart_removequantite')]
    public function remove($id,CartService $cartService): Response
    {

        $cartService->remove($id);

        return $this->redirectToRoute("app_cart_show",[], Response::HTTP_SEE_OTHER);
    }



}
