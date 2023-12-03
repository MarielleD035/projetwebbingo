<?php

namespace App\Controller;

use App\Entity\MakeAccess;
use App\Form\MakeAccessType;
use App\Repository\MakeAccessRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/make/access')]
class MakeAccessController extends AbstractController
{
    #[Route('/', name: 'app_make_access_index', methods: ['GET'])]
    public function index(MakeAccessRepository $makeAccessRepository): Response
    {
        return $this->render('make_access/index.html.twig', [
            'make_accesses' => $makeAccessRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_make_access_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $makeAccess = new MakeAccess();
        $form = $this->createForm(MakeAccessType::class, $makeAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($makeAccess);
            $entityManager->flush();

            return $this->redirectToRoute('app_make_access_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('make_access/new.html.twig', [
            'make_access' => $makeAccess,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_make_access_show', methods: ['GET'])]
    public function show(MakeAccess $makeAccess): Response
    {
        return $this->render('make_access/show.html.twig', [
            'make_access' => $makeAccess,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_make_access_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MakeAccess $makeAccess, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MakeAccessType::class, $makeAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_make_access_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('make_access/edit.html.twig', [
            'make_access' => $makeAccess,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_make_access_delete', methods: ['POST'])]
    public function delete(Request $request, MakeAccess $makeAccess, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$makeAccess->getId(), $request->request->get('_token'))) {
            $entityManager->remove($makeAccess);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_make_access_index', [], Response::HTTP_SEE_OTHER);
    }
}
