<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328104400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_car (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_B519C3164CE34BEC (part_id), INDEX IDX_B519C316C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_car ADD CONSTRAINT FK_B519C3164CE34BEC FOREIGN KEY (part_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE part_car ADD CONSTRAINT FK_B519C316C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_car');
    }
}
