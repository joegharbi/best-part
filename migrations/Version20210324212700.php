<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324212700 extends AbstractMigration
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
        $this->addSql('DROP TABLE model_year_engine');
        $this->addSql('ALTER TABLE model_year ADD id INT AUTO_INCREMENT NOT NULL, CHANGE model_id model_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_year_engine (id INT AUTO_INCREMENT NOT NULL, model_year_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_9EBE0A38E78C9C0A (engine_id), INDEX IDX_9EBE0A3820529756 (model_year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE model_year MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE model_year DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE model_year DROP id, CHANGE model_id model_id INT NOT NULL');
        $this->addSql('ALTER TABLE model_year ADD PRIMARY KEY (model_id, year_id)');
    }
}
