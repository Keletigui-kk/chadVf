<?php

namespace App\Controller;

use App\Entity\Adhesions;
use App\Form\AdhesionsType;
use App\Repository\AhesionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adhesions")
 */
class AdhesionsController extends AbstractController
{
    /**
     * @Route("/", name="adhesions_index", methods={"GET"})
     */
    public function index(AhesionsRepository $ahesionsRepository): Response
    {
        return $this->render('adhesions/index.html.twig', [
            'adhesions' => $ahesionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="adhesions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adhesion = new Adhesions();
        $form = $this->createForm(AdhesionsType::class, $adhesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adhesion);
            $entityManager->flush();

            return $this->redirectToRoute('adhesions_index');
        }

        return $this->render('adhesions/new.html.twig', [
            'adhesion' => $adhesion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adhesions_show", methods={"GET"})
     */
    public function show(Adhesions $adhesion): Response
    {
        return $this->render('adhesions/show.html.twig', [
            'adhesion' => $adhesion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adhesions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Adhesions $adhesion): Response
    {
        $form = $this->createForm(AdhesionsType::class, $adhesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adhesions_index');
        }

        return $this->render('adhesions/edit.html.twig', [
            'adhesion' => $adhesion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adhesions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Adhesions $adhesion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adhesion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adhesion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adhesions_index');
    }
}
