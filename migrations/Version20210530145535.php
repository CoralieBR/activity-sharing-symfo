<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210530145535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_membre (groupe_id INT NOT NULL, membre_id INT NOT NULL, INDEX IDX_9D8A07137A45358C (groupe_id), INDEX IDX_9D8A07136A99F74A (membre_id), PRIMARY KEY(groupe_id, membre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre_groupe (membre_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_9EB019986A99F74A (membre_id), INDEX IDX_9EB019987A45358C (groupe_id), PRIMARY KEY(membre_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_membre ADD CONSTRAINT FK_9D8A07137A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_membre ADD CONSTRAINT FK_9D8A07136A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB019986A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_groupe ADD CONSTRAINT FK_9EB019987A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe ADD cree_par_id INT DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21FC29C013 FOREIGN KEY (cree_par_id) REFERENCES membre (id)');
        $this->addSql('CREATE INDEX IDX_4B98C21FC29C013 ON groupe (cree_par_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE groupe_membre');
        $this->addSql('DROP TABLE membre_groupe');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21FC29C013');
        $this->addSql('DROP INDEX IDX_4B98C21FC29C013 ON groupe');
        $this->addSql('ALTER TABLE groupe DROP cree_par_id, DROP description');
    }
}
