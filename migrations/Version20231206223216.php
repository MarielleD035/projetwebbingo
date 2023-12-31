<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206223216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bingo_grid DROP FOREIGN KEY FK_1ADA89879F37AE5');
        $this->addSql('DROP INDEX IDX_1ADA89879F37AE5 ON bingo_grid');
        $this->addSql('ALTER TABLE bingo_grid DROP id_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bingo_grid ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE bingo_grid ADD CONSTRAINT FK_1ADA89879F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_1ADA89879F37AE5 ON bingo_grid (id_user_id)');
    }
}
