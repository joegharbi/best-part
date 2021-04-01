<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323111313 extends AbstractMigration
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
        $this->addSql('ALTER TABLE model_production_year DROP FOREIGN KEY FK_4FBD366155D4737A');
        $this->addSql('DROP TABLE model_production_year');
        $this->addSql('DROP TABLE production_year');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_production_year (model_id INT NOT NULL, production_year_id INT NOT NULL, INDEX IDX_4FBD36617975B7E7 (model_id), INDEX IDX_4FBD366155D4737A (production_year_id), PRIMARY KEY(model_id, production_year_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE production_year (id INT AUTO_INCREMENT NOT NULL, prod_year VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE model_production_year ADD CONSTRAINT FK_4FBD366155D4737A FOREIGN KEY (production_year_id) REFERENCES production_year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_production_year ADD CONSTRAINT FK_4FBD36617975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
    }
}
