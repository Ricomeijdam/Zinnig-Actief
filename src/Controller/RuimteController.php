<?php

namespace App\Controller;

use App\Entity\Ruimte;
use App\Form\RuimteType;
use App\Repository\RuimteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ruimte")
 */
class RuimteController extends AbstractController
{
    /**
     * @Route("/", name="ruimte_index", methods={"GET"})
     */
    public function index(RuimteRepository $ruimteRepository): Response
    {
        return $this->render('ruimte/index.html.twig', [
            'ruimtes' => $ruimteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ruimte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ruimte = new Ruimte();
        $form = $this->createForm(RuimteType::class, $ruimte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ruimte);
            $entityManager->flush();

            return $this->redirectToRoute('ruimte_index');
        }

        return $this->render('ruimte/new.html.twig', [
            'ruimte' => $ruimte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ruimte_show", methods={"GET"})
     */
    public function show(Ruimte $ruimte): Response
    {
        return $this->render('ruimte/show.html.twig', [
            'ruimte' => $ruimte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ruimte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ruimte $ruimte): Response
    {
        $form = $this->createForm(RuimteType::class, $ruimte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ruimte_index', [
                'id' => $ruimte->getId(),
            ]);
        }

        return $this->render('ruimte/edit.html.twig', [
            'ruimte' => $ruimte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ruimte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ruimte $ruimte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ruimte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ruimte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ruimte_index');
    }
}
