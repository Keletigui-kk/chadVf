<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218105646 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adhesions (id INT AUTO_INCREMENT NOT NULL, infos_id INT DEFAULT NULL, is_paid TINYINT(1) NOT NULL, somme DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_90757B47544A4CCA (infos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cotisations (id INT AUTO_INCREMENT NOT NULL, infos_id INT DEFAULT NULL, is_paid TINYINT(1) NOT NULL, somme DOUBLE PRECISION NOT NULL, INDEX IDX_C51B351C544A4CCA (infos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adhesions ADD CONSTRAINT FK_90757B47544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('ALTER TABLE cotisations ADD CONSTRAINT FK_C51B351C544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE adhesions');
        $this->addSql('DROP TABLE cotisations');
    }
}
