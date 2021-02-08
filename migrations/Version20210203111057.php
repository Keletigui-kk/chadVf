<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203111057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A544A4CCA');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A544A4CCA ON images');
        $this->addSql('ALTER TABLE images DROP infos_id');
        $this->addSql('ALTER TABLE infos ADD image_name VARCHAR(255) NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images ADD infos_id INT NOT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A544A4CCA ON images (infos_id)');
        $this->addSql('ALTER TABLE infos DROP image_name, DROP updated_at');
    }
}
