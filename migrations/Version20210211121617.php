<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211121617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ahesions CHANGE ispaid is_paid TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE cotisations CHANGE ispaid is_paid TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ahesions CHANGE is_paid ispaid TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE cotisations CHANGE is_paid ispaid TINYINT(1) NOT NULL');
    }
}
