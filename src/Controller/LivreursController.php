<?php

namespace App\Controller;

use App\Entity\Livreurs;
use App\Form\LivreursType;
use App\Repository\LivreursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/Livreurs")
 */
class LivreursController extends AbstractController
{
    /**
     * @Route("/", name="Livreurs_index", methods="GET")
     */
    public function index(LivreursRepository $LivreursRepository): Response
    {
        return $this->render('livreurs/index.html.twig', ['Livreurs' => $LivreursRepository->findAll()]);
    }

    /**
     * @Route("/new", name="Livreurs_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $Livreur = new Livreurs();
        $form = $this->createForm(LivreursType::class, $Livreur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Livreur);
            $em->flush();
            $this->addFlash('notice','Le Livreur '.$Livreur->getNomLivreur(). ' a ete ajoute avec success!');
            return $this->redirectToRoute('Livreurs_index');
        }

        return $this->render('livreurs/new.html.twig', [
            'Livreur' => $Livreur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Livreurs_show", methods="GET")
     */
    public function show(Livreurs $Livreur): Response
    {
        return $this->render('livreurs/show.html.twig', ['Livreur' => $Livreur]);
    }

    /**
     * @Route("/{id}/edit", name="Livreurs_edit", methods="GET|POST")
     */
    public function edit(Request $request, Livreurs $Livreur): Response
    {
        $form = $this->createForm(LivreursType::class, $Livreur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice','Les informations du  '.$Livreur->getNomLivreur(). ' ont ete modifie avec success!');
            return $this->redirectToRoute('Livreurs_edit', ['id' => $Livreur->getId()]);
        }

        return $this->render('livreurs/edit.html.twig', [
            'Livreur' => $Livreur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Livreurs_delete", methods="DELETE")
     */
    public function delete(Request $request, Livreurs $Livreur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Livreur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Livreur);
            $em->flush();
        }
        $this->addFlash('notice','Le Livreur  '.$Livreur->getNomLivreur(). ' ont ete supprime avec success!');
        return $this->redirectToRoute('Livreurs_index');
    }
}
