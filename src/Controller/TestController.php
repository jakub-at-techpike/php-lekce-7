<?php

namespace App\Controller;

use App\Entity\PurchaseOrder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/test")
 */
class TestController extends AbstractController
{
    /**
     * @Route("/", name="test_index")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    
    /**
     * @Route("/{id}", name="test_detail")
     */
    public function detail(PurchaseOrder $purchaseOrder)
    {
        return $this->render('test/detail.html.twig', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }
}
