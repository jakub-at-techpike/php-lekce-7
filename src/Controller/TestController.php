<?php

namespace App\Controller;

use App\Entity\PurchaseOrder;
use App\Repository\ProgrammingLanguageRepository;
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
     * @Route("/list", name="test_list")
     */
    public function list(ProgrammingLanguageRepository $programmingLanguageRepository)
    {
        return $this->render('test/list.html.twig', [
            'programmingLanguages' => $programmingLanguageRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/known", name="test_known")
     */
    public function known(ProgrammingLanguageRepository $programmingLanguageRepository)
    {
        return $this->render('test/known.html.twig', [
            'programmingLanguages' => $programmingLanguageRepository->findKnown(),
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
