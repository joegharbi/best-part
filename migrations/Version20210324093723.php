<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324093723 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE year ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE year ADD CONSTRAINT FK_BB8273377975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_BB8273377975B7E7 ON year (model_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE year DROP FOREIGN KEY FK_BB8273377975B7E7');
        $this->addSql('DROP INDEX IDX_BB8273377975B7E7 ON year');
        $this->addSql('ALTER TABLE year DROP model_id');
    }
}
