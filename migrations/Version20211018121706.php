<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018121706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sollicitatie (id INT AUTO_INCREMENT NOT NULL, vacature_id INT NOT NULL, werknemer_id INT NOT NULL, datum DATE NOT NULL, uitgenodigd VARCHAR(255) NOT NULL, INDEX IDX_9577817D6FB89BA0 (vacature_id), INDEX IDX_9577817D876F9FF5 (werknemer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sollicitatie ADD CONSTRAINT FK_9577817D6FB89BA0 FOREIGN KEY (vacature_id) REFERENCES vacature (id)');
        $this->addSql('ALTER TABLE sollicitatie ADD CONSTRAINT FK_9577817D876F9FF5 FOREIGN KEY (werknemer_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sollicitatie');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
