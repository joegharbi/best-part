<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328101054 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, make_id INT NOT NULL, model_id INT NOT NULL, engine_id INT NOT NULL, year_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_773DE69DCFBF73EB (make_id), INDEX IDX_773DE69D7975B7E7 (model_id), INDEX IDX_773DE69DE78C9C0A (engine_id), INDEX IDX_773DE69D40C1FEA7 (year_id), INDEX IDX_773DE69D78D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DCFBF73EB FOREIGN KEY (make_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DE78C9C0A FOREIGN KEY (engine_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D40C1FEA7 FOREIGN KEY (year_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D78D28519 FOREIGN KEY (transmission_id) REFERENCES material_master (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE car');
    }
}
