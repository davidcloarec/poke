<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use App\Notification\NotificationService;
use App\Repository\PokemonRepository;
use App\Repository\SpecieRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/pokemon', name: 'pokemon_')]
class PokemonController extends AbstractController
{
    #[Route('/ajout', name: 'ajout')]
    public function ajout(TypeRepository $typeRepository, SpecieRepository $specieRepository): Response
    {
        $types = $typeRepository->findAll();
        $species = $specieRepository->findAll();
        return $this->render('pokemon/ajout.html.twig', [
            'types' => $types,
            'species' => $species
        ]);
    }

    #[Route('/liste', name: 'liste')]
    public function liste(PokemonRepository $pokemonRepository): Response
    {
        $pokemons = $pokemonRepository->findAll();

        return $this->render('pokemon/liste.html.twig', [
            'pokemons'=>$pokemons
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(EntityManagerInterface $entityManager,
                        Request $request,
                        SpecieRepository $specieRepository,
                        NotificationService $notificationService): Response
    {
        $pokemon = new Pokemon();
        $pokemonForm = $this->createForm(PokemonType::class, $pokemon);
        $species = $specieRepository->findAll();

        $pokemonForm->handleRequest($request);

        if ($pokemonForm->isSubmitted() && $pokemonForm->isValid()) {
            $entityManager->persist($pokemon);
            $entityManager->flush();
            //$senderMail = $this->getParameter('mail.contact');
            //$receiverMail = $this->getParameter('mail.admin');
            //$notificationService->sendMailCreation($senderMail, $receiverMail);
            return $this->redirectToRoute('pokemon_liste');
        }

        return $this->render('pokemon/add.html.twig', [
            'pokemonForm' => $pokemonForm->createView(),
            'species' => $species
        ]);
    }
}
