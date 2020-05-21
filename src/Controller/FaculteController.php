<?php

namespace App\Controller;

use App\Entity\Faculte;
use App\Form\FaculteType;
use App\Repository\FaculteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/faculte")
 */
class FaculteController extends AbstractController
{
    /**
     * @Route("/", name="faculte_index", methods={"GET"})
     */
    public function index(FaculteRepository $faculteRepository): Response
    {
        return $this->render('faculte/index.html.twig', [
            'facultes' => $faculteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="faculte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $faculte = new Faculte();
        $form = $this->createForm(FaculteType::class, $faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($faculte);
            $entityManager->flush();

            return $this->redirectToRoute('faculte_index');
        }

        return $this->render('faculte/new.html.twig', [
            'faculte' => $faculte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faculte_show", methods={"GET"})
     */
    public function show(Faculte $faculte): Response
    {
        return $this->render('faculte/show.html.twig', [
            'faculte' => $faculte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="faculte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Faculte $faculte): Response
    {
        $form = $this->createForm(FaculteType::class, $faculte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faculte_index');
        }

        return $this->render('faculte/edit.html.twig', [
            'faculte' => $faculte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="faculte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Faculte $faculte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$faculte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($faculte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('faculte_index');
    }
}
