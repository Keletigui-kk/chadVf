<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211112136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE infos ADD civilitesexe VARCHAR(255) NOT NULL');
        $this->addSql('CREATE FULLTEXT INDEX IDX_EECA826D6C6E55B5A625945BAC199498 ON infos (nom, prenom, image_name)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_EECA826D6C6E55B5A625945BAC199498 ON infos');
        $this->addSql('ALTER TABLE infos DROP civilitesexe');
    }
}
