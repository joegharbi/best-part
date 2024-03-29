<?php

namespace App\Controller;

use App\Cart\CartService;
use App\Form\CartConfirmationType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;
    /**
     * @var CartService
     */
    protected $cartService;

    public function __construct(ProductRepository $productRepository,CartService $cartService){
        $this->cartService=$cartService;
        $this->productRepository=$productRepository;
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add", requirements={"id":"\d+"})
     */
    public function add($id,Request $request)
    {
        $product = $this->productRepository->find($id);


        if (!$product) {
            throw $this->createNotFoundException("The product $id does not exist");
        }


        $this->cartService->add($id);

        $this->addFlash('success', 'The product successfully added to your cart');

        if ($request->query->get('returnToCart')){
            return $this->redirectToRoute('cart_show');
        }
        return $this->redirectToRoute('product_show', [
            'slug' => $product->getSlug(),
            'subcategory_slug'=> $product->getSubCategory()->getSlug(),
            'category_slug'=> $product->getSubCategory()->getCategory()->getSlug()
        ]);
    }

    /**
     * @Route("/cart" ,name="cart_show")
     */
    public function show()
    {
        $form=$this->createForm(CartConfirmationType::class);

        $detailedCart = $this->cartService->getDetailedCartItems();
        $total = $this->cartService->getTotal();

        return $this->render('cart/index.html.twig', [
            'items' => $detailedCart,
            'total' => $total,
            'confirmationForm'=>$form->createView()
        ]);
    }

    /**
     * @Route ("/cart/delete/{id}", name="cart_delete", requirements={"id":"\d+"})
     */
    public function delete($id)
    {

        $product = $this->productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException("the product you want to delete $id dose not exist");
        }

        $this->cartService->remove($id);

        $this->addFlash("success", 'Product deleted successfully');

        return $this->redirectToRoute('cart_show');
    }

    /**
     * @Route ("/cart/decremet/{id}",name="cart_decrement",requirements={"id":"\d+"})
     */
    public function decrement($id)
    {
        $product = $this->productRepository->find($id);
        if (!$product) {
            throw $this->createNotFoundException("the product you want to decrement $id dose not exist");
        }

        $this->cartService->decrement($id);
        $this->addFlash('success', 'The product is decremented');
        return $this->redirectToRoute('cart_show');
    }
}
