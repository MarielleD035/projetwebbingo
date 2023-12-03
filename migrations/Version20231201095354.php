<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231201095354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bingo_grid ADD iduser_id INT NOT NULL');
        $this->addSql('ALTER TABLE bingo_grid ADD CONSTRAINT FK_1ADA898786A81FB FOREIGN KEY (iduser_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_1ADA898786A81FB ON bingo_grid (iduser_id)');
        $this->addSql('ALTER TABLE cell ADD idgrid_id INT NOT NULL');
        $this->addSql('ALTER TABLE cell ADD CONSTRAINT FK_CB8787E2F3F53AFB FOREIGN KEY (idgrid_id) REFERENCES bingo_grid (id)');
        $this->addSql('CREATE INDEX IDX_CB8787E2F3F53AFB ON cell (idgrid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bingo_grid DROP FOREIGN KEY FK_1ADA898786A81FB');
        $this->addSql('DROP INDEX IDX_1ADA898786A81FB ON bingo_grid');
        $this->addSql('ALTER TABLE bingo_grid DROP iduser_id');
        $this->addSql('ALTER TABLE cell DROP FOREIGN KEY FK_CB8787E2F3F53AFB');
        $this->addSql('DROP INDEX IDX_CB8787E2F3F53AFB ON cell');
        $this->addSql('ALTER TABLE cell DROP idgrid_id');
    }
}
