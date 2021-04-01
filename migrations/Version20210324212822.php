<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324212822 extends AbstractMigration
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
        $this->addSql('CREATE TABLE model_year_engine (id INT AUTO_INCREMENT NOT NULL, model_year_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_9EBE0A3820529756 (model_year_id), INDEX IDX_9EBE0A38E78C9C0A (engine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model_year_engine ADD CONSTRAINT FK_9EBE0A3820529756 FOREIGN KEY (model_year_id) REFERENCES model_year (id)');
        $this->addSql('ALTER TABLE model_year_engine ADD CONSTRAINT FK_9EBE0A38E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE model_year_engine');
    }
}
