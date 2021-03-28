<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328083344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766E2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D92B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('ALTER TABLE transmission ADD CONSTRAINT FK_7F87199F2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('ALTER TABLE year ADD CONSTRAINT FK_BB8273372B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE make DROP FOREIGN KEY FK_1ACC766E2B2DC1F1');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D92B2DC1F1');
        $this->addSql('ALTER TABLE transmission DROP FOREIGN KEY FK_7F87199F2B2DC1F1');
        $this->addSql('ALTER TABLE year DROP FOREIGN KEY FK_BB8273372B2DC1F1');
    }
}
