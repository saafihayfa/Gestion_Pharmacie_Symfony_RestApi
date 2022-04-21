<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420214843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stocks DROP FOREIGN KEY FK_56F798059D86650F');
        $this->addSql('DROP INDEX IDX_56F798059D86650F ON stocks');
        $this->addSql('ALTER TABLE stocks ADD entree INT NOT NULL, DROP user_id_id, DROP entrée');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stocks ADD entrée INT NOT NULL, CHANGE entree user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE stocks ADD CONSTRAINT FK_56F798059D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_56F798059D86650F ON stocks (user_id_id)');
    }
}
