<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    private $authors;
   
    public function __construct()
    {
        
        $this->authors = array(
            array('id' => 1, 'picture' => '/image/123.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/image/ws.png','username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/image/th.png','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    }
    #[Route('/author/{name}', name: 'app_author', defaults: ['name' => 'cab'],methods:['GET'])]

    public function showAuthor($name): Response
    {
        return $this->render('author/show.html.twig', [
            
            'name' => $name
        ]);
    }
    #[Route('/list_author', name: 'list_author')]
    public function listAuthor():  Response
    {
        
        return $this->render('author/list.html.twig', [
            
            'authors' => $this->authors
        ]);

    }
    #[Route('/author/details/{id}', name: 'author_details', methods: ['GET'])]
    public function authorDetails($id): Response
{
    $author = null;

    // Rechercher l'auteur par son ID dans la liste des auteurs
    foreach ($this->authors as $a) {
        if ($a['id'] == $id) {
            $author = $a;
            break;
        }
    }

    if ($author === null) {
        throw $this->createNotFoundException('Auteur non trouvé');
    }

    
    return $this->render('author/showAuthor.html.twig', [
        'author' => $author,
    ]);
}

 
}
