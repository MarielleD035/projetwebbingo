<?php

namespace App\Test\Controller;

use App\Entity\BingoGrid;
use App\Repository\BingoGridRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BingoGridControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private BingoGridRepository $repository;
    private string $path = '/bingo/grid/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(BingoGrid::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('BingoGrid index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'bingo_grid[gridname]' => 'Testing',
            'bingo_grid[cote]' => 'Testing',
            'bingo_grid[iduser]' => 'Testing',
        ]);

        self::assertResponseRedirects('/bingo/grid/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new BingoGrid();
        $fixture->setGridname('My Title');
        $fixture->setCote('My Title');
        $fixture->setIduser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('BingoGrid');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new BingoGrid();
        $fixture->setGridname('My Title');
        $fixture->setCote('My Title');
        $fixture->setIduser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'bingo_grid[gridname]' => 'Something New',
            'bingo_grid[cote]' => 'Something New',
            'bingo_grid[iduser]' => 'Something New',
        ]);

        self::assertResponseRedirects('/bingo/grid/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getGridname());
        self::assertSame('Something New', $fixture[0]->getCote());
        self::assertSame('Something New', $fixture[0]->getIduser());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new BingoGrid();
        $fixture->setGridname('My Title');
        $fixture->setCote('My Title');
        $fixture->setIduser('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/bingo/grid/');
    }
}
