<?php

namespace App\Controller\Purchase;


use App\Cart\CartService;
use App\Entity\Purchase;
use App\Form\CartConfirmationType;
use App\Purchase\PurchasePersister;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PurchaseConfirmationController extends AbstractController
{
    protected $cartService;
    protected $em;
    protected $persister;

    public function __construct(EntityManagerInterface $em, CartService $cartService,PurchasePersister $persister)
    {
        $this->cartService = $cartService;
        $this->em = $em;
        $this->persister=$persister;
    }

    /**
     * @Route("/purchase/confirm",name="purchase_confirm")
     * @IsGranted("ROLE_USER",message="You need to be conntected to confirm this order")
     */
    public function confirm(Request $request)
    {

        $form=$this->createForm(CartConfirmationType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted()) {
            $this->addFlash('warning', 'You need to fill the form of delivery confirmation');
            return $this->redirectToRoute('cart_show');
        }

        $cartItems = $this->cartService->getDetailedCartItems();
        if (count($cartItems) === 0) {
            $this->addFlash('warning', 'You cannot confirm a purchase on an empty cart');
           return $this->redirectToRoute('cart_show');
        }


        /** @var Purchase */
        $purchase = $form->getData();

        $this->persister->storePersist($purchase);


        return $this->redirectToRoute('purchase_payment_form',[
            'id'=>$purchase->getId()
        ]);

    }

}