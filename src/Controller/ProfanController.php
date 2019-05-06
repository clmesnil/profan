<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Form\ArticleType;
use App\Entity\Stock;
use App\Repository\StockRepository;
class ProfanController extends AbstractController
{
    /**
     * @Route("/stock", name="profan_stock")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Stock::class);
        $stocks = $repo->findAll();
        
        return $this->render('profan/index.html.twig', [
            'controller_name' => 'ProfanController',
            'stocks' => $stocks
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('profan/home.html.twig', [
            'title' => "Bienvenue sur l'outil de gestion de stock du pole plurimédia du lycée Lafayette !",
            'age' => 31
       ]);
    }

    /**
     * @Route("/ajout", name="profan_ajouter")
     * @Route("/stock/{id}/edit", name="profan_edit")
    */
    public function form(Stock $stock =null, Request $request, ObjectManager $manager)
    {

        if(!$stock)
        {
            $stock = new Stock();
        }


        $form = $this->createForm(ArticleType::class, $stock);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            $stock->setModifiedAt(new \DateTime());

            $manager->persist($stock);
            $manager->flush();

            return $this->redirectToRoute('profan_show', ['id' => $stock->getId()]);
        }

        return $this->render('profan/ajout.html.twig', [
            'formStock' => $form->createView(),
            'editMode' => $stock->getId() !== null //boolée: True si l'article existe; False s'il n'existe pas
        ]);

    }

    /**
     * @Route("/stock/{id}", name="profan_show")
     */
    public function show($id)
    {
        
        $repo = $this->getDoctrine()->getRepository(Stock::class);
        $stock = $repo->find($id);

        return $this->render('profan/show.html.twig', ['stock'=>$stock]);
    }


    /**
     * @Route("/supports_imprimables", name="show_supports")
     */
    public function supports()
    {
        $repo = $this->getDoctrine()->getRepository(Stock::class);
        $stocks = $repo->findAll();
        
        return $this->render('profan/supports.html.twig', [
            'controller_name' => 'ProfanController',
            'stocks' => $stocks
        ]);
    }

    /**
     * @Route("/encres", name="show_encres")
     */
    public function encres()
    {
        $repo = $this->getDoctrine()->getRepository(Stock::class);
        $stocks = $repo->findAll();
        
        return $this->render('profan/encres.html.twig', [
            'controller_name' => 'ProfanController',
            'stocks' => $stocks
        ]);
    }    

    /**
     * @Route("/produit", name="show_produits")
     */
    public function produits()
    {
        $repo = $this->getDoctrine()->getRepository(Stock::class);
        $stocks = $repo->findAll();
        
        return $this->render('profan/produits.html.twig', [
            'controller_name' => 'ProfanController',
            'stocks' => $stocks
        ]);
    }
}
