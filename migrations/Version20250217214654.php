<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250217214654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__atelier AS SELECT id, nom, description FROM atelier');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('CREATE TABLE atelier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, instructeur_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, CONSTRAINT FK_E1BB182325FCA809 FOREIGN KEY (instructeur_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO atelier (id, nom, description) SELECT id, nom, description FROM __temp__atelier');
        $this->addSql('DROP TABLE __temp__atelier');
        $this->addSql('CREATE INDEX IDX_E1BB182325FCA809 ON atelier (instructeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__atelier AS SELECT id, nom, description FROM atelier');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('CREATE TABLE atelier (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO atelier (id, nom, description) SELECT id, nom, description FROM __temp__atelier');
        $this->addSql('DROP TABLE __temp__atelier');
    }
}
