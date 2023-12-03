<?php

namespace App\Controller;

use App\Entity\ReadAccess;
use App\Form\ReadAccessType;
use App\Repository\ReadAccessRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/read/access')]
class ReadAccessController extends AbstractController
{
    #[Route('/', name: 'app_read_access_index', methods: ['GET'])]
    public function index(ReadAccessRepository $readAccessRepository): Response
    {
        return $this->render('read_access/index.html.twig', [
            'read_accesses' => $readAccessRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_read_access_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $readAccess = new ReadAccess();
        $form = $this->createForm(ReadAccessType::class, $readAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($readAccess);
            $entityManager->flush();

            return $this->redirectToRoute('app_read_access_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('read_access/new.html.twig', [
            'read_access' => $readAccess,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_read_access_show', methods: ['GET'])]
    public function show(ReadAccess $readAccess): Response
    {
        return $this->render('read_access/show.html.twig', [
            'read_access' => $readAccess,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_read_access_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReadAccess $readAccess, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReadAccessType::class, $readAccess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_read_access_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('read_access/edit.html.twig', [
            'read_access' => $readAccess,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_read_access_delete', methods: ['POST'])]
    public function delete(Request $request, ReadAccess $readAccess, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$readAccess->getId(), $request->request->get('_token'))) {
            $entityManager->remove($readAccess);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_read_access_index', [], Response::HTTP_SEE_OTHER);
    }
}
