<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324160814 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE model_year');
        $this->addSql('ALTER TABLE year DROP FOREIGN KEY FK_BB8273377975B7E7');
        $this->addSql('DROP INDEX IDX_BB8273377975B7E7 ON year');
        $this->addSql('ALTER TABLE year DROP model_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_year (model_id INT NOT NULL, year_id INT NOT NULL, INDEX IDX_96D55FD07975B7E7 (model_id), INDEX IDX_96D55FD040C1FEA7 (year_id), PRIMARY KEY(model_id, year_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE model_year ADD CONSTRAINT FK_96D55FD040C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_year ADD CONSTRAINT FK_96D55FD07975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE year ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE year ADD CONSTRAINT FK_BB8273377975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_BB8273377975B7E7 ON year (model_id)');
    }
}
