<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018122130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacature ADD systeem_id INT NOT NULL, ADD werkgever_id INT NOT NULL, CHANGE omschrijving omschrijving MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5C1AB1400 FOREIGN KEY (systeem_id) REFERENCES systeem (id)');
        $this->addSql('ALTER TABLE vacature ADD CONSTRAINT FK_9E5830F5F1317686 FOREIGN KEY (werkgever_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_9E5830F5C1AB1400 ON vacature (systeem_id)');
        $this->addSql('CREATE INDEX IDX_9E5830F5F1317686 ON vacature (werkgever_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacature DROP FOREIGN KEY FK_9E5830F5C1AB1400');
        $this->addSql('ALTER TABLE vacature DROP FOREIGN KEY FK_9E5830F5F1317686');
        $this->addSql('DROP INDEX IDX_9E5830F5C1AB1400 ON vacature');
        $this->addSql('DROP INDEX IDX_9E5830F5F1317686 ON vacature');
        $this->addSql('ALTER TABLE vacature DROP systeem_id, DROP werkgever_id, CHANGE omschrijving omschrijving MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
