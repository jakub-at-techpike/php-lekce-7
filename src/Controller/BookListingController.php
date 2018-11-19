<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/book-listing")
 */
class BookListingController extends AbstractController
{
    /**
     * @Route("/century", name="book_listing_century")
     */
    public function century(BookRepository $bookRepository)
    {
        return $this->render('book_listing/century.html.twig', [
            'books' => [
                'Před rokem 1900' => $bookRepository->findByYearRange(null, 1900),
                'Mezi léty 1901 a 2000' => $bookRepository->findByYearRange(1901, 2000),
                'Po roce 2001' => $bookRepository->findByYearRange(2001),
            ]
        ]);
    }
    
    /**
     * @Route("/author", name="book_listing_author")
     */
    public function author(BookRepository $bookRepository) {
        return $this->render('book_listing/author.html.twig', [
            'books' => $bookRepository->findBy([], ['author' => 'ASC'])
        ]);
    }
    
    /**
     * @Route("/price", name="book_listing_price")
     */
    public function price(BookRepository $bookRepository)
    {
        return $this->render('book_listing/price.html.twig', [
            'books' => $bookRepository->findBy([], ['price' => 'ASC'])
        ]);
    }
    
    /**
     * @Route("/new", name="book_listing_new")
     */
    public function new(BookRepository $bookRepository)
    {
        return $this->render('book_listing/new.html.twig', [
            'books' => $bookRepository->findNew()
        ]);
    }
}
