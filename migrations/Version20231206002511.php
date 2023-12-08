<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206002511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cell DROP FOREIGN KEY FK_CB8787E2F3F53AFB');
        $this->addSql('DROP INDEX IDX_CB8787E2F3F53AFB ON cell');
        $this->addSql('ALTER TABLE cell ADD bingo_grid_id INT DEFAULT NULL, DROP idgrid_id');
        $this->addSql('ALTER TABLE cell ADD CONSTRAINT FK_CB8787E25BF8C5CD FOREIGN KEY (bingo_grid_id) REFERENCES bingo_grid (id)');
        $this->addSql('CREATE INDEX IDX_CB8787E25BF8C5CD ON cell (bingo_grid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cell DROP FOREIGN KEY FK_CB8787E25BF8C5CD');
        $this->addSql('DROP INDEX IDX_CB8787E25BF8C5CD ON cell');
        $this->addSql('ALTER TABLE cell ADD idgrid_id INT NOT NULL, DROP bingo_grid_id');
        $this->addSql('ALTER TABLE cell ADD CONSTRAINT FK_CB8787E2F3F53AFB FOREIGN KEY (idgrid_id) REFERENCES bingo_grid (id)');
        $this->addSql('CREATE INDEX IDX_CB8787E2F3F53AFB ON cell (idgrid_id)');
    }
}
