<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528084758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, activite_id INT NOT NULL, nom_groupe VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, jour VARCHAR(15) DEFAULT NULL, heure_debut INT NOT NULL, heure_fin INT NOT NULL, adresse_numero VARCHAR(15) DEFAULT NULL, adresse_rue VARCHAR(255) DEFAULT NULL, cp VARCHAR(10) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, valide TINYINT(1) DEFAULT NULL, INDEX IDX_4B98C219B0F88B1 (activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre_activite (membre_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_D17BD266A99F74A (membre_id), INDEX IDX_D17BD269B0F88B1 (activite_id), PRIMARY KEY(membre_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C219B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE membre_activite ADD CONSTRAINT FK_D17BD266A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre_activite ADD CONSTRAINT FK_D17BD269B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE contact');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone INT NOT NULL, message VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, reception DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE membre_activite');
    }
}
