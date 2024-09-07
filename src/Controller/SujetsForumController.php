<?php

namespace App\Controller;

use App\Entity\SujetsForum;
use App\Form\SujetsForumType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sujets/forum')]
final class SujetsForumController extends AbstractController
{
    #[Route(name: 'app_sujets_forum_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $sujetsForums = $entityManager
            ->getRepository(SujetsForum::class)
            ->findAll();

        return $this->render('sujets_forum/index.html.twig', [
            'sujets_forums' => $sujetsForums,
        ]);
    }

    #[Route('/new', name: 'app_sujets_forum_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sujetsForum = new SujetsForum();
        $form = $this->createForm(SujetsForumType::class, $sujetsForum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sujetsForum);
            $entityManager->flush();

            return $this->redirectToRoute('app_sujets_forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sujets_forum/new.html.twig', [
            'sujets_forum' => $sujetsForum,
            'form' => $form,
        ]);
    }

    #[Route('/{idSujetForum}', name: 'app_sujets_forum_show', methods: ['GET'])]
    public function show(SujetsForum $sujetsForum): Response
    {
        return $this->render('sujets_forum/show.html.twig', [
            'sujets_forum' => $sujetsForum,
        ]);
    }

    #[Route('/{idSujetForum}/edit', name: 'app_sujets_forum_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SujetsForum $sujetsForum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SujetsForumType::class, $sujetsForum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_sujets_forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('sujets_forum/edit.html.twig', [
            'sujets_forum' => $sujetsForum,
            'form' => $form,
        ]);
    }

    #[Route('/{idSujetForum}', name: 'app_sujets_forum_delete', methods: ['POST'])]
    public function delete(Request $request, SujetsForum $sujetsForum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sujetsForum->getIdSujetForum(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($sujetsForum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_sujets_forum_index', [], Response::HTTP_SEE_OTHER);
    }
}
