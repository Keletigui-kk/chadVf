<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211121845 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cotisations ADD infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cotisations ADD CONSTRAINT FK_C51B351C544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_C51B351C544A4CCA ON cotisations (infos_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cotisations DROP FOREIGN KEY FK_C51B351C544A4CCA');
        $this->addSql('DROP INDEX IDX_C51B351C544A4CCA ON cotisations');
        $this->addSql('ALTER TABLE cotisations DROP infos_id');
    }
}
