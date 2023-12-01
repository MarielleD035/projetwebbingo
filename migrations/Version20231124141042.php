<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124141042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE make_access (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE make_access_users (make_access_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_310E67FA046D9B6 (make_access_id), INDEX IDX_310E67F67B3B43D (users_id), PRIMARY KEY(make_access_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE make_access_bingo_grid (make_access_id INT NOT NULL, bingo_grid_id INT NOT NULL, INDEX IDX_2C9C0FC4A046D9B6 (make_access_id), INDEX IDX_2C9C0FC45BF8C5CD (bingo_grid_id), PRIMARY KEY(make_access_id, bingo_grid_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE read_access (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE read_access_users (read_access_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_FCF29C307B600C1B (read_access_id), INDEX IDX_FCF29C3067B3B43D (users_id), PRIMARY KEY(read_access_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE read_access_bingo_grid (read_access_id INT NOT NULL, bingo_grid_id INT NOT NULL, INDEX IDX_CBFF79187B600C1B (read_access_id), INDEX IDX_CBFF79185BF8C5CD (bingo_grid_id), PRIMARY KEY(read_access_id, bingo_grid_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE make_access_users ADD CONSTRAINT FK_310E67FA046D9B6 FOREIGN KEY (make_access_id) REFERENCES make_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_users ADD CONSTRAINT FK_310E67F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_bingo_grid ADD CONSTRAINT FK_2C9C0FC4A046D9B6 FOREIGN KEY (make_access_id) REFERENCES make_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_bingo_grid ADD CONSTRAINT FK_2C9C0FC45BF8C5CD FOREIGN KEY (bingo_grid_id) REFERENCES bingo_grid (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_users ADD CONSTRAINT FK_FCF29C307B600C1B FOREIGN KEY (read_access_id) REFERENCES read_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_users ADD CONSTRAINT FK_FCF29C3067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_bingo_grid ADD CONSTRAINT FK_CBFF79187B600C1B FOREIGN KEY (read_access_id) REFERENCES read_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_bingo_grid ADD CONSTRAINT FK_CBFF79185BF8C5CD FOREIGN KEY (bingo_grid_id) REFERENCES bingo_grid (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE make_access_users DROP FOREIGN KEY FK_310E67FA046D9B6');
        $this->addSql('ALTER TABLE make_access_users DROP FOREIGN KEY FK_310E67F67B3B43D');
        $this->addSql('ALTER TABLE make_access_bingo_grid DROP FOREIGN KEY FK_2C9C0FC4A046D9B6');
        $this->addSql('ALTER TABLE make_access_bingo_grid DROP FOREIGN KEY FK_2C9C0FC45BF8C5CD');
        $this->addSql('ALTER TABLE read_access_users DROP FOREIGN KEY FK_FCF29C307B600C1B');
        $this->addSql('ALTER TABLE read_access_users DROP FOREIGN KEY FK_FCF29C3067B3B43D');
        $this->addSql('ALTER TABLE read_access_bingo_grid DROP FOREIGN KEY FK_CBFF79187B600C1B');
        $this->addSql('ALTER TABLE read_access_bingo_grid DROP FOREIGN KEY FK_CBFF79185BF8C5CD');
        $this->addSql('DROP TABLE make_access');
        $this->addSql('DROP TABLE make_access_users');
        $this->addSql('DROP TABLE make_access_bingo_grid');
        $this->addSql('DROP TABLE read_access');
        $this->addSql('DROP TABLE read_access_users');
        $this->addSql('DROP TABLE read_access_bingo_grid');
    }
}
