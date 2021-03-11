<?php


namespace App\Controller\Purchase;

use App\Cart\CartService;
use App\Entity\Purchase;
use App\Repository\PurchaseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PurchasePaymentSuccessController extends AbstractController{


    /**
     * @Route("purchase/terminate/{id}",name="purchase_payment_success")
     * @IsGranted("ROLE_USER")
     */
    public function success($id,PurchaseRepository $purchaseRepository,EntityManagerInterface $em,CartService $cartService){

        $purchase=$purchaseRepository->find($id);
        if(!$purchase||
            ($purchase&&$purchase->getUser()!==$this->getUser())||
            ($purchase->getStatus()===Purchase::STATUS_PAID)){
            $this->addFlash('warning','the order does not exist');
        }

        $purchase->setStatus(Purchase::STATUS_PAID);

        $em->flush();
        $cartService->empty();

        $this->addFlash('success','your order is payed and confirmed');

        return $this->redirectToRoute('purchases_index');

    }
}