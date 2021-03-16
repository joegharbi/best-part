<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210313165914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1F7BFE87C');
        $this->addSql('DROP INDEX UNIQ_64C19C1F7BFE87C ON category');
        $this->addSql('ALTER TABLE category DROP sub_category_id');
        $this->addSql('ALTER TABLE sub_category ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sub_category ADD CONSTRAINT FK_BCE3F79812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BCE3F79812469DE2 ON sub_category (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD sub_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1F7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_category (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C1F7BFE87C ON category (sub_category_id)');
        $this->addSql('ALTER TABLE sub_category DROP FOREIGN KEY FK_BCE3F79812469DE2');
        $this->addSql('DROP INDEX UNIQ_BCE3F79812469DE2 ON sub_category');
        $this->addSql('ALTER TABLE sub_category DROP category_id');
    }
}
