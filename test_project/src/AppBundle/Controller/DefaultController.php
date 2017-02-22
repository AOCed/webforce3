<?php
// src/AppBundle/Controller/DefaultController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Post;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     *@Route("/write", name="post")
     */
    public function newAction(Request $request)
    {

        // Create a post and give it some dummy data for an example
        $post = new Post();
        // $post->setFullname('novlike');
        // $post->setTitle('Test Post');
        // $post->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        // $post->setPublishDate(new \DateTime('today'));

        $form = $this->createFormBuilder($post)
            ->add('fullname', TextType::class)
            ->add('title', TextType::class)
            ->add('content', TextareaType::class)
            ->add('publish_date', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Ecrire un post'))
            ->getForm();

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

            dump($post);

            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('list');
        }



        return $this->render('default/new.html.twig', array(
            'title' => 'Poster',
            'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/testpost")
     */
    public function createAction()
    {
        $post = new Post();
        $post->setFullname('novlike');
        $post->setTitle('Test');
        $post->setContent('Test Test');
        $post->setPublishDate(new \DateTime('tomorrow'));

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);

        $em->flush();

        return new Response('blabla');
    }

    /**
     * @Route("/list")
     *
     */
    public function showAction()
    {
        $post = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        if(!$post) {
            throw $this->createNotFoundException(
                'no product found'
            );
        }

        return $this->render('default/list.html.twig', array(
            'title' => 'Articles',
            'post' => $post,
        ));

    }





}
