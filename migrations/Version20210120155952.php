<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210120155952 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63544A4CCA');
        $this->addSql('DROP INDEX IDX_C1765B63544A4CCA ON departement');
        $this->addSql('ALTER TABLE departement CHANGE infos_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_C1765B63A76ED395 ON departement (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63A76ED395');
        $this->addSql('DROP INDEX IDX_C1765B63A76ED395 ON departement');
        $this->addSql('ALTER TABLE departement CHANGE user_id infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('CREATE INDEX IDX_C1765B63544A4CCA ON departement (infos_id)');
    }
}
