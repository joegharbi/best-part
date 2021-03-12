<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;



class ProductController extends AbstractController
{
    /**
     * @Route("/{slug}", name="product_category",priority="-1")
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
     * @Route("/{category_slug}/{slug}" ,name="product_show",priority="-1")
     */
    public function show($slug, ProductRepository $productRepository)
    {
//        $category = $categoryRepository->findOneBy(['slug' => $category_slug]);
//        $product = $productRepository->findOneBy(['category' => $category, 'slug' => $slug]);

        $product = $productRepository->findOneBy(['slug' => $slug]);
        if (!$product) {
            $this->createNotFoundException("the product you're searching for does not exist");
        }

       // $dispatcher->dispatch(new ProductViewEvent($product),'product.view');

        return $this->render('product/show.html.twig', [
            'product' => $product
        ]);

    }

    /**
     * @Route ("/admin/product/{id}/edit" , name="product_edit")
     * @IsGranted("ROLE_ADMIN",message="You are not allowed to edit a product")
     */
    public function edit($id, ProductRepository $productRepository, Request $request, EntityManagerInterface $entityManager)
    {

        $product = $productRepository->find($id);

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

           return $this->redirectToRoute('product_show',[
               'category_slug'=>$product->getCategory()->getSlug(),
               'slug'=>$product->getSlug()

           ]);
//            return $this->render('product/show.html.twig', [
//                'product'=>$product]);
        }
        $formView = $form->createView();

        return $this->render('product/edit.html.twig',
            ['product' => $product,
                'formView' => $formView]);
    }

    /**
     * @Route("/admin/product/create", name="product_create")
     * @IsGranted("ROLE_ADMIN",message="You are not allowed to create a product")
     */
    public function create(Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager)
    {
        $product = new Product;
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $product->setSlug(strtolower($slugger->slug($product->getName())));
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->render('product/show.html.twig', [
                'product'=>$product
            ]);
        }

        $formView = $form->createView();


        return $this->render('product/create.html.twig', ['formView' => $formView]);
    }
}
