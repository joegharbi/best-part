<?php

namespace App\Controller\Purchase;


use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PurchasesListController extends AbstractController
{

    /**
     * @Route ("/purchases",name="purchases_index")
     * @IsGranted ("ROLE_USER", message="You need to login to access your purchases")
     */
    public function index()
    {
        /** @var User */
        $user = $this->getUser();

       return $this->render('purchase/index.html.twig', [
            'purchases' => $user->getPurchases()
        ]);
    }
}
