<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200521100936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE etudiant CHANGE math math INT NOT NULL, CHANGE physique physique INT DEFAULT NULL, CHANGE geo geo INT DEFAULT NULL, CHANGE histoire histoire INT DEFAULT NULL, CHANGE francais francais INT DEFAULT NULL, CHANGE gestion gestion INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin DROP email, DROP password');
        $this->addSql('ALTER TABLE etudiant CHANGE math math INT DEFAULT NULL, CHANGE physique physique INT DEFAULT NULL, CHANGE geo geo INT DEFAULT NULL, CHANGE histoire histoire INT DEFAULT NULL, CHANGE francais francais INT DEFAULT NULL, CHANGE gestion gestion INT DEFAULT NULL');
    }
}
