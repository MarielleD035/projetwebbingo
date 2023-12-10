<?php

namespace App\Controller;

use App\Entity\BingoGrid;
use App\Entity\MakeAccess;
use App\Entity\Users;
use App\Form\BingoGrid3Type;
use App\Repository\BingoGridRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

#[Route('/bingo/grid')]
class BingoGridController extends AbstractController
{
    #[Route('/', name: 'app_bingo_grid_index', methods: ['GET'])]
    public function index(BingoGridRepository $bingoGridRepository, #[CurrentUser()] ?Users $user): Response
    {
        return $this->render('bingo_grid/index.html.twig', [
            'bingo_grids' => $bingoGridRepository->findAll(),
            'user' => $user,
        ]);
    }

    #[Route('/new', name: 'app_bingo_grid_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, #[CurrentUser()] ?Users $user): Response
    {
        $bingoGrid = new BingoGrid();
        $form = $this->createForm(BingoGrid3Type::class, $bingoGrid);
        $form->handleRequest($request);

        $makeAccess = new MakeAccess();
        $makeAccess->setIduser($user);
        $makeAccess->setIdGrid($bingoGrid->getId());
        $bingoGrid->addMakeAccess($makeAccess);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($makeAccess);
            $entityManager->persist($bingoGrid);
            $entityManager->flush();

            return $this->redirectToRoute('app_bingo_grid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bingo_grid/new.html.twig', [
            'bingo_grid' => $bingoGrid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bingo_grid_show', methods: ['GET'])]
    public function show(BingoGrid $bingoGrid): Response
    {
        return $this->render('bingo_grid/show.html.twig', [
            'bingo_grid' => $bingoGrid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bingo_grid_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BingoGrid $bingoGrid, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BingoGrid3Type::class, $bingoGrid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bingo_grid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bingo_grid/edit.html.twig', [
            'bingo_grid' => $bingoGrid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bingo_grid_delete', methods: ['POST'])]
    public function delete(Request $request, BingoGrid $bingoGrid, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bingoGrid->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bingoGrid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bingo_grid_index', [], Response::HTTP_SEE_OTHER);
    }
}
