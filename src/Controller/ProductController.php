<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/{slug}", name="product_category")
     */
    public function category($slug, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy([
                'slug' => $slug]
        );
        if (!$category) {
            throw $this->createNotFoundException("The category you chose does not exist ");
        }
        return $this->render('product/category.html.twig', [
            'slug' => $slug,
            'category' => $category
        ]);
    }

    /**
     * @Route("/{category_slug}/{slug}" ,name="product_show"))
     */
    public function show($slug, ProductRepository $productRepository)
    {
//        $category = $categoryRepository->findOneBy(['slug' => $category_slug]);
//        $product = $productRepository->findOneBy(['category' => $category, 'slug' => $slug]);
        $product=$productRepository->findOneBy(['slug'=>$slug]);
        if (!$product) {
            $this->createNotFoundException("the product you're searching for does not exist");
        }

        return $this->render('product/show.html.twig', [
            'product' => $product
//            'category'=>$category
        ]);

    }
}
