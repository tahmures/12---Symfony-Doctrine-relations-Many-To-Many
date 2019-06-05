<?php

namespace App\Controller;
use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryTypeController extends AbstractController
{
    /**
     * @Route("/category/add", name="category_add")
     */
    public function add(Request $request, EntityManagerInterface $em) : Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
       //dump($category); dump($form);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('app_index');
        }
        return $this->render('category_type/add.html.twig', [
            'controller_name' => 'CategoryTypeController',
            'form' => $form->createView(),
        ]);
    }
}
