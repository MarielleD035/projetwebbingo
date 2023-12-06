<?php

namespace App\Controller;

use App\Entity\Cell;
use App\Form\Cell1Type;
use App\Repository\CellRepository;
use App\Repository\BingoGridRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cell')]
class CellController extends AbstractController
{
    #[Route('/', name: 'app_cell_index', methods: ['GET'])]
    public function index(CellRepository $cellRepository): Response
    {
        return $this->render('cell/index.html.twig', [
            'cells' => $cellRepository->findAll(),
        ]);
    }

    #[Route('/newgrid', name: 'app_cell_grid', methods: ['GET', 'POST'])]
    public function grid(Request $request, EntityManagerInterface $entityManager, CellRepository $cellRepository,BingoGridRepository $bingoGridRepository ): Response
    {
        /*$m = 5;
        $n = 5;
        $a = [];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                echo sprintf("Entrez a[%d][%d] : ", $i, $j);
                $a[$i][$j] = readline();
            }
        }
        return $this->render('cell/grid.html.twig',[
            'cells'=>$a,
        ]);*/
        $bingoGrid = $bingoGridRepository->find(1);
        $cell = $cellRepository->findBy(['bingoGrid'=>$bingoGrid], );
        return $this->render('cell/grid.html.twig', [
            'cells' => $cell,
        ]);

    }

    #[Route('/new', name: 'app_cell_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cell = new Cell();
        $form = $this->createForm(Cell1Type::class, $cell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cell);
            $entityManager->flush();

            return $this->redirectToRoute('app_cell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cell/new.html.twig', [
            'cell' => $cell,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cell_show', methods: ['GET'])]
    public function show(Cell $cell): Response
    {
        return $this->render('cell/show.html.twig', [
            'cell' => $cell,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cell_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cell $cell, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Cell1Type::class, $cell);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cell_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cell/edit.html.twig', [
            'cell' => $cell,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cell_delete', methods: ['POST'])]
    public function delete(Request $request, Cell $cell, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cell->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cell);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cell_index', [], Response::HTTP_SEE_OTHER);
    }
}
