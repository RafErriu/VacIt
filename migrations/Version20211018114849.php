<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018114849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD voornaam VARCHAR(255) NOT NULL, ADD achternaam VARCHAR(255) DEFAULT NULL, ADD geboortedatum VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP voornaam, DROP achternaam, DROP geboortedatum');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
