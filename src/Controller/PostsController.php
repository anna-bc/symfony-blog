<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\DatabaseEngine;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends AbstractController
{
    /**
     * @return Response
     */
    public function createPost(): Response
    {
        $request = Request::createFromGlobals();
        $title = $request->request->get('title');
        $content = $request->request->get('content');
        $author = $request->request->get('author');

        if (in_array('', [$title, $content, $author])) {
            return $this->render('/post/Err_CreatePost.html.twig');
        }

        $post = (new Post(new DatabaseEngine))->setTitle($title)->setContent($content)->setAuthor($author);
        $post->save();

        return $this->render('/post/showPost.html.twig', ['title' => $post->getTitle(), 'content' => $post->getContent(), 'author' => $post->getAuthor()]);
    }

    public function getPost(int $id) : Response {
        try {
            $post = Post::getPost(new DatabaseEngine(), $id);
            return $this->render('/post/showPost.html.twig', ['title' => $post->getTitle(), 'content' => $post->getContent(), 'author' => $post->getAuthor()]);
        } catch (Exception $e) {
            return $this->render('post/Err_GetPost.html.twig', ['id' => $id]);
        }
    }

    public function deletePost(int $id) : Response {
        try {
            $post = Post::getPost(new DatabaseEngine(), $id);
            $post->delete();
            return $this->render('post/deletePost.html.twig', ['id' => $id]);
        } catch (Exception $e) {
            return $this->render('post/Err_deletePost.html.twig', ['id' => $id]);
        }
    }
}
