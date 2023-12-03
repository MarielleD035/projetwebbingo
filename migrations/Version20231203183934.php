<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231203183934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE make_access_users (make_access_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_310E67FA046D9B6 (make_access_id), INDEX IDX_310E67F67B3B43D (users_id), PRIMARY KEY(make_access_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE read_access_users (read_access_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_FCF29C307B600C1B (read_access_id), INDEX IDX_FCF29C3067B3B43D (users_id), PRIMARY KEY(read_access_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE make_access_users ADD CONSTRAINT FK_310E67FA046D9B6 FOREIGN KEY (make_access_id) REFERENCES make_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_users ADD CONSTRAINT FK_310E67F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_users ADD CONSTRAINT FK_FCF29C307B600C1B FOREIGN KEY (read_access_id) REFERENCES read_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_users ADD CONSTRAINT FK_FCF29C3067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_user DROP FOREIGN KEY FK_A96E03D7A76ED395');
        $this->addSql('ALTER TABLE make_access_user DROP FOREIGN KEY FK_A96E03D7A046D9B6');
        $this->addSql('ALTER TABLE read_access_user DROP FOREIGN KEY FK_447E3C0E7B600C1B');
        $this->addSql('ALTER TABLE read_access_user DROP FOREIGN KEY FK_447E3C0EA76ED395');
        $this->addSql('DROP TABLE make_access_user');
        $this->addSql('DROP TABLE read_access_user');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE bingo_grid ADD CONSTRAINT FK_1ADA898786A81FB FOREIGN KEY (iduser_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bingo_grid DROP FOREIGN KEY FK_1ADA898786A81FB');
        $this->addSql('CREATE TABLE make_access_user (make_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A96E03D7A046D9B6 (make_access_id), INDEX IDX_A96E03D7A76ED395 (user_id), PRIMARY KEY(make_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE read_access_user (read_access_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_447E3C0E7B600C1B (read_access_id), INDEX IDX_447E3C0EA76ED395 (user_id), PRIMARY KEY(read_access_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE make_access_user ADD CONSTRAINT FK_A96E03D7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_user ADD CONSTRAINT FK_A96E03D7A046D9B6 FOREIGN KEY (make_access_id) REFERENCES make_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_user ADD CONSTRAINT FK_447E3C0E7B600C1B FOREIGN KEY (read_access_id) REFERENCES read_access (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE read_access_user ADD CONSTRAINT FK_447E3C0EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE make_access_users DROP FOREIGN KEY FK_310E67FA046D9B6');
        $this->addSql('ALTER TABLE make_access_users DROP FOREIGN KEY FK_310E67F67B3B43D');
        $this->addSql('ALTER TABLE read_access_users DROP FOREIGN KEY FK_FCF29C307B600C1B');
        $this->addSql('ALTER TABLE read_access_users DROP FOREIGN KEY FK_FCF29C3067B3B43D');
        $this->addSql('DROP TABLE make_access_users');
        $this->addSql('DROP TABLE read_access_users');
        $this->addSql('DROP TABLE users');
    }
}
