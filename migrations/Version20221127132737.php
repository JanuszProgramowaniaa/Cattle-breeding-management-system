<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221127132737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX id_UNIQUE ON doctor');
        $this->addSql('ALTER TABLE doctor ADD first_name VARCHAR(45) NOT NULL, ADD last_name VARCHAR(45) NOT NULL, DROP firstName, DROP lastName, DROP doctorcol, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctor ADD firstName VARCHAR(45) DEFAULT NULL, ADD lastName VARCHAR(45) DEFAULT NULL, ADD doctorcol VARCHAR(45) DEFAULT NULL, DROP first_name, DROP last_name, CHANGE id id INT NOT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX id_UNIQUE ON doctor (id)');
    }
}
