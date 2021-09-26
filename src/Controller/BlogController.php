<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use App\Entity\Post;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(PostRepository $ripo): Response
    {
        $posts = $ripo->findAll();

        return $this->render('blog/index.html.twig', [
            'post' => $posts
        ]);
    }

    /**
     * @Route("/posts/{id}", name="show_post")
     */
    public function show(Post $post){
        return $this->render('blog/post.html.twig', [
            'post' => $post
        ]);
    }
}
