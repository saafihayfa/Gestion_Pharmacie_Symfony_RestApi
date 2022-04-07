<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407005821 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, nom VARCHAR(20) NOT NULL, libellé VARCHAR(255) NOT NULL, quantité INT NOT NULL, date_commande DATE NOT NULL, INDEX IDX_35D4282C9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes_fournisseurs (commandes_id INT NOT NULL, fournisseurs_id INT NOT NULL, INDEX IDX_8F11EFA58BF5C2E6 (commandes_id), INDEX IDX_8F11EFA527ACDDFD (fournisseurs_id), PRIMARY KEY(commandes_id, fournisseurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicaments (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, stocks_id INT DEFAULT NULL, nom VARCHAR(20) NOT NULL, libellé VARCHAR(255) NOT NULL, prix INT NOT NULL, INDEX IDX_DD988ACB9D86650F (user_id_id), INDEX IDX_DD988ACBFACB6020 (stocks_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stocks (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, nom VARCHAR(20) NOT NULL, entrée INT NOT NULL, sortie INT NOT NULL, etat VARCHAR(20) NOT NULL, INDEX IDX_56F798059D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventes (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, nom_médicament VARCHAR(30) NOT NULL, quantité INT NOT NULL, prix INT NOT NULL, INDEX IDX_64EC489A9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandes_fournisseurs ADD CONSTRAINT FK_8F11EFA58BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes_fournisseurs ADD CONSTRAINT FK_8F11EFA527ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicaments ADD CONSTRAINT FK_DD988ACB9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE medicaments ADD CONSTRAINT FK_DD988ACBFACB6020 FOREIGN KEY (stocks_id) REFERENCES stocks (id)');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F798059D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes_fournisseurs DROP FOREIGN KEY FK_8F11EFA58BF5C2E6');
        $this->addSql('ALTER TABLE medicaments DROP FOREIGN KEY FK_DD988ACBFACB6020');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE commandes_fournisseurs');
        $this->addSql('DROP TABLE medicaments');
        $this->addSql('DROP TABLE stocks');
        $this->addSql('DROP TABLE ventes');
    }
}
