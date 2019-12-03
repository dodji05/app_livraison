<?php

namespace App\Controller;

use App\Entity\Restaurants;
use App\Entity\Plats;
use App\Form\RestaurantsType;
use App\Repository\RestaurantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/restaurants")
 */
class RestaurantsController extends AbstractController
{
    /**
     * @Route("/", name="restaurants_index", methods={"GET"})
     */
    public function index(RestaurantsRepository $restaurantsRepository): Response
    {
        return $this->render('restaurants/index.html.twig', [
            'restaurants' => $restaurantsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="restaurants_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $restaurant = new Restaurants();
        $form = $this->createForm(RestaurantsType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($restaurant);
            $entityManager->flush();

            return $this->redirectToRoute('restaurants_index');
        }

        return $this->render('restaurants/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/complet", name="restaurants_plats_new", methods={"GET","POST"})
     */
    public function ajoutComplet(Request $request): Response
    {
        $restaurant = new Restaurants();
        $plats  = new Plats();
        $restaurant->addPlat($plats);
       
        $form = $this->createForm(RestaurantsType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            foreach ($form->getData()->getPlats() as $Plats) {
              
                $Plats->setRestaurant($restaurant);

                $em->persist($Plats);
                


            }
            $em->persist($restaurant);
             $em->flush();

            $this->addFlash('notice','le restautant et ses plats ont été ajouté avec sucess ');
            return $this->redirectToRoute('restaurants_index');
        }

        return $this->render('restaurants/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurants_show", methods={"GET"})
     */
    public function show(Restaurants $restaurant): Response
    {
        return $this->render('restaurants/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="restaurants_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Restaurants $restaurant): Response
    {
        $form = $this->createForm(RestaurantsType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('restaurants_index');
        }

        return $this->render('restaurants/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="restaurants_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Restaurants $restaurant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($restaurant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('restaurants_index');
    }
}
