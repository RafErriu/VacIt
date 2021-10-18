<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018115357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD telefoonnummer VARCHAR(255) NOT NULL, ADD adres VARCHAR(255) NOT NULL, ADD postcode VARCHAR(50) NOT NULL, ADD woonplaats VARCHAR(255) NOT NULL, ADD motivatie VARCHAR(10000) DEFAULT NULL, ADD cv VARCHAR(1000) DEFAULT NULL, ADD record_type VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP telefoonnummer, DROP adres, DROP postcode, DROP woonplaats, DROP motivatie, DROP cv, DROP record_type');
        $this->addSql('ALTER TABLE vacature CHANGE omschrijving omschrijving MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
