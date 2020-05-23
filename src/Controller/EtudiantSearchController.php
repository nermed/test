<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\SearchType;
use App\Entity\Search;
use App\Repository\EtudiantRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantSearchController extends AbstractController
{
    /**
     * @Route("/etudiant/search", name="etudiant_search")
     */
    public function index(Request $request, EtudiantRepository $etudiantRepository): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);
        $etudiants= [];
        if($form->isSubmitted() && $form->isValid()){
            //on recupère le nom de l'étudiant
            $nom = $search->getNom();
            if($nom != ''){
                $etudiants = $this->getDoctrine()->getRepository(Etudiant::class)->findBy(['nom' => $nom]);
            }else{
                $etudiants = $this->getDoctrine()->getRepository(Etudiant::class)->findAll();
            }
        }

        return $this->render('etudiant_search/index.html.twig', [
            'controller_name' => 'EtudiantSearchController',
            'form' => $form->createView(),
            'etudiants' => $etudiants
        ]);
    }
    /**
     * @Route("/{nom}", name="etudiant.show", methods={"GET"})
     */
    public function show(Etudiant $etudiant): Response
    {
        return $this->render('etudiant_search/show.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }
}
