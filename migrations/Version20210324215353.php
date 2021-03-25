<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324215353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_model DROP FOREIGN KEY FK_44E6253A7975B7E7');
        $this->addSql('DROP INDEX IDX_44E6253A7975B7E7 ON part_model');
        $this->addSql('ALTER TABLE part_model DROP model_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_model ADD model_id INT NOT NULL');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A7975B7E7 FOREIGN KEY (model_id) REFERENCES model_year_engine_transmission (id)');
        $this->addSql('CREATE INDEX IDX_44E6253A7975B7E7 ON part_model (model_id)');
    }
}
