<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326175807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_model (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, model_id INT NOT NULL, INDEX IDX_44E6253A4CE34BEC (part_id), INDEX IDX_44E6253A7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A4CE34BEC FOREIGN KEY (part_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A7975B7E7 FOREIGN KEY (model_id) REFERENCES model_year_engine_transmission (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_model');
    }
}