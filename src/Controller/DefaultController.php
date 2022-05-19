<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", methods="GET", name="homepage")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->findAll();
        dd($product);
        return $this->render('main/default/index.html.twig', []);
    }

    /**
     * @Route ("/product-add", methods="GET", name="product_add")
     */
    public function productAdd(): Response
    {
        $product = new Product();
        $product->setTitle('Product' . rand(1, 100));
        $product->setDescription('smth');
        $product->setPrice(10);
        $product->setQuantity(1);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}