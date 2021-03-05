<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route("/admin/category/create", name="category_create")
     */
    public function create(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category->setSlug(strtolower($slugger->slug($category->getName())));
            $entityManager->persist($category);
            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }

        $formView = $form->createView();


        return $this->render('category/create.html.twig', ['formView' => $formView]);
    }


    /**
     * @Route("/admin/category/{id}/edit",name="category_edit")
     */
    public function edit($id, CategoryRepository $categoryRepository, SluggerInterface $slugger, EntityManagerInterface $entityManager, Request $request)
    {

        $category = $categoryRepository->find($id);
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

//            $category->setSlug(strtolower($slugger->slug($category->getName())));

            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }


        $formView = $form->createView();
        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'formView' => $formView]);
    }
}
