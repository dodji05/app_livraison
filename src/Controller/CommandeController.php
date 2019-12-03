<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Clients;
use App\Entity\LigneCommandes;
use App\Entity\Commandes;
use App\Form\ClientsType;
use App\Form\CommandesType;




class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    function NouvelleCommande (Request $request){
        $doctrine = $this->getDoctrine();
        $commande = new Commandes();

        $ligne = new LigneCommandes();
        // $tag1->name = 'tag1';
    $commande->addLigneCommande($ligne);
        $client = new Clients();
        $form = $this->createForm(CommandesType::class, $commande)

            ->add('client', ClientsType::class, array('data' => $client, 'mapped' => false,));
        $form->handleRequest($request);

        // On recupere les informations sur le stock du produit
       
        $repclients = $doctrine->getRepository('App:Clients');

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            foreach ($form->getData()->getligneCommande() as $LigneCommande) {
//
                $LigneCommande->setVente($commande);

                $em->persist($ligneCommande);
                
                

            }
        $telclient = $request->get('Commandes')['client']["Telephone1"];
            // on verifie si le client existe deja dans la base de donnnee
            $clientdeja = $repclients->findOneBy(array('Telephone1'=>$telclient) );
            if(!$clientdeja){
                // il n existe pas , nous le sauvergadons dans la base
                $commande->setClient($client);
                $em->persist($commande);
                $em->flush();
            }
            else {
                $vente->setClient($clientdeja);
                $em->persist($commande);
                $em->detach($client);
                $em->flush();
            }

            $this->addFlash('notice','La vente a été enregistrée avec sucess ');
            return $this->redirectToRoute('facture',array('id_vente'=>$vente->getId()));

        }
        return $this->render('commande/nouvelle_vente.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
