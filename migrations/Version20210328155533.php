<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328155533 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_car DROP FOREIGN KEY FK_B519C316C3C6F69F');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D40C1FEA7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D78D28519');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DCFBF73EB');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DE78C9C0A');
        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE make (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, make_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_D79572D9CFBF73EB (make_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_year (id INT AUTO_INCREMENT NOT NULL, model_id INT DEFAULT NULL, year_id INT NOT NULL, INDEX IDX_96D55FD07975B7E7 (model_id), INDEX IDX_96D55FD040C1FEA7 (year_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_year_engine (id INT AUTO_INCREMENT NOT NULL, model_year_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_9EBE0A3820529756 (model_year_id), INDEX IDX_9EBE0A38E78C9C0A (engine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model_year_engine_transmission (id INT AUTO_INCREMENT NOT NULL, model_year_engine_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_400E40CA9A0F0787 (model_year_engine_id), INDEX IDX_400E40CA78D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_model (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, model_id INT NOT NULL, INDEX IDX_44E6253A4CE34BEC (part_id), INDEX IDX_44E6253A7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE year (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9CFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('ALTER TABLE model_year ADD CONSTRAINT FK_96D55FD07975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE model_year ADD CONSTRAINT FK_96D55FD040C1FEA7 FOREIGN KEY (year_id) REFERENCES year (id)');
        $this->addSql('ALTER TABLE model_year_engine ADD CONSTRAINT FK_9EBE0A3820529756 FOREIGN KEY (model_year_id) REFERENCES model_year (id)');
        $this->addSql('ALTER TABLE model_year_engine ADD CONSTRAINT FK_9EBE0A38E78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
        $this->addSql('ALTER TABLE model_year_engine_transmission ADD CONSTRAINT FK_400E40CA9A0F0787 FOREIGN KEY (model_year_engine_id) REFERENCES model_year_engine (id)');
        $this->addSql('ALTER TABLE model_year_engine_transmission ADD CONSTRAINT FK_400E40CA78D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A4CE34BEC FOREIGN KEY (part_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A7975B7E7 FOREIGN KEY (model_id) REFERENCES model_year_engine_transmission (id)');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE material_master');
        $this->addSql('DROP TABLE part_car');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model_year_engine DROP FOREIGN KEY FK_9EBE0A38E78C9C0A');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9CFBF73EB');
        $this->addSql('ALTER TABLE model_year DROP FOREIGN KEY FK_96D55FD07975B7E7');
        $this->addSql('ALTER TABLE model_year_engine DROP FOREIGN KEY FK_9EBE0A3820529756');
        $this->addSql('ALTER TABLE model_year_engine_transmission DROP FOREIGN KEY FK_400E40CA9A0F0787');
        $this->addSql('ALTER TABLE part_model DROP FOREIGN KEY FK_44E6253A7975B7E7');
        $this->addSql('ALTER TABLE model_year_engine_transmission DROP FOREIGN KEY FK_400E40CA78D28519');
        $this->addSql('ALTER TABLE model_year DROP FOREIGN KEY FK_96D55FD040C1FEA7');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, make_id INT NOT NULL, model_id INT NOT NULL, engine_id INT NOT NULL, year_id INT NOT NULL, transmission_id INT NOT NULL, INDEX IDX_773DE69D7975B7E7 (model_id), INDEX IDX_773DE69D40C1FEA7 (year_id), INDEX IDX_773DE69DCFBF73EB (make_id), INDEX IDX_773DE69DE78C9C0A (engine_id), INDEX IDX_773DE69D78D28519 (transmission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE material_master (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, make VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, model VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, year INT DEFAULT NULL, engine VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, transmission VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE part_car (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_B519C316C3C6F69F (car_id), INDEX IDX_B519C3164CE34BEC (part_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D40C1FEA7 FOREIGN KEY (year_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D78D28519 FOREIGN KEY (transmission_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DCFBF73EB FOREIGN KEY (make_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DE78C9C0A FOREIGN KEY (engine_id) REFERENCES material_master (id)');
        $this->addSql('ALTER TABLE part_car ADD CONSTRAINT FK_B519C3164CE34BEC FOREIGN KEY (part_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE part_car ADD CONSTRAINT FK_B519C316C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE make');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE model_year');
        $this->addSql('DROP TABLE model_year_engine');
        $this->addSql('DROP TABLE model_year_engine_transmission');
        $this->addSql('DROP TABLE part_model');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE year');
    }
}
