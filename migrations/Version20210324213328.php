<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324213328 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_year_engine_transmission (id INT AUTO_INCREMENT NOT NULL, model_year_engine_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_400E40CA9A0F0787 (model_year_engine_id), INDEX IDX_400E40CA78D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model_year_engine_transmission ADD CONSTRAINT FK_400E40CA9A0F0787 FOREIGN KEY (model_year_engine_id) REFERENCES model_year_engine (id)');
        $this->addSql('ALTER TABLE model_year_engine_transmission ADD CONSTRAINT FK_400E40CA78D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model_year_engine_transmission DROP FOREIGN KEY FK_400E40CA78D28519');
        $this->addSql('DROP TABLE model_year_engine_transmission');
        $this->addSql('DROP TABLE transmission');
    }
}
