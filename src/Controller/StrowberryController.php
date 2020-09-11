<?php

namespace App\Controller;

use App\Entity\Strowberry;
use App\Form\StrowberryType;
use App\Repository\StrowberryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/strowberry")
 */
class StrowberryController extends AbstractController
{
    /**
     * @Route("/", name="strowberry_index", methods={"GET"})
     */
    public function index(StrowberryRepository $strowberryRepository): Response
    {
        return $this->render('strowberry/index.html.twig', [
            'strowberries' => $strowberryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="strowberry_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $strowberry = new Strowberry();
        $form = $this->createForm(StrowberryType::class, $strowberry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($strowberry);
            $entityManager->flush();

            return $this->redirectToRoute('strowberry_index');
        }

        return $this->render('strowberry/new.html.twig', [
            'strowberry' => $strowberry,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="strowberry_show", methods={"GET"})
     */
    public function show(Strowberry $strowberry): Response
    {
        return $this->render('strowberry/show.html.twig', [
            'strowberry' => $strowberry,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="strowberry_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Strowberry $strowberry): Response
    {
        $form = $this->createForm(StrowberryType::class, $strowberry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('strowberry_index');
        }

        return $this->render('strowberry/edit.html.twig', [
            'strowberry' => $strowberry,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="strowberry_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Strowberry $strowberry): Response
    {
        if ($this->isCsrfTokenValid('delete'.$strowberry->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($strowberry);
            $entityManager->flush();
        }

        return $this->redirectToRoute('strowberry_index');
    }
}
