<?php

namespace App\Controller;

use App\Form\ProductFormType;
use App\DTO\ProductDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function product(Request $request): Response
    {
        $productDTO = new ProductDTO();
        $form = $this->createForm(ProductFormType::class, $productDTO);
        $form->handleRequest($request);

        return $this->render('product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
