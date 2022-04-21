<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420232207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ventes DROP FOREIGN KEY FK_64EC489A9D86650F');
        $this->addSql('DROP INDEX IDX_64EC489A9D86650F ON ventes');
        $this->addSql('ALTER TABLE ventes ADD quantite INT NOT NULL, DROP user_id_id, DROP quantité, CHANGE nom_médicament nom VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ventes ADD quantité INT NOT NULL, CHANGE quantite user_id_id INT NOT NULL, CHANGE nom nom_médicament VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489A9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_64EC489A9D86650F ON ventes (user_id_id)');
    }
}
