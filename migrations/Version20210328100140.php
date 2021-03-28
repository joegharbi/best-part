<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328100140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE year');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, material_master_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_E8A81A8D2B2DC1F1 (material_master_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE make (id INT AUTO_INCREMENT NOT NULL, material_master_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_1ACC766E2B2DC1F1 (material_master_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, material_master_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D79572D92B2DC1F1 (material_master_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, material_master_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_7F87199F2B2DC1F1 (material_master_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, material_master_id INT NOT NULL, year VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_BB8273372B2DC1F1 (material_master_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE engine ADD CONSTRAINT FK_E8A81A8D2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766E2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D92B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE transmission ADD CONSTRAINT FK_7F87199F2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE year ADD CONSTRAINT FK_BB8273372B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
    }
}
