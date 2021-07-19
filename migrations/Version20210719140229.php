<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210719140229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, nom_artiste VARCHAR(255) NOT NULL, description_artiste VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE son (id INT AUTO_INCREMENT NOT NULL, nom_son VARCHAR(255) NOT NULL, longueur_son INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE son_artiste ADD CONSTRAINT FK_35678B8E65EFA242 FOREIGN KEY (son_id) REFERENCES son (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE son_artiste ADD CONSTRAINT FK_35678B8E21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE son_artiste DROP FOREIGN KEY FK_35678B8E21D25844');
        $this->addSql('ALTER TABLE son_artiste DROP FOREIGN KEY FK_35678B8E65EFA242');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE son');
        $this->addSql('DROP TABLE user');
    }
}
