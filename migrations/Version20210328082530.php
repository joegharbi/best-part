<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328082530 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
//        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE engine ADD material_master_id INT NOT NULL');
//        $this->addSql('ALTER TABLE engine ADD CONSTRAINT FK_E8A81A8D2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('CREATE INDEX IDX_E8A81A8D2B2DC1F1 ON engine (material_master_id)');
//        $this->addSql('ALTER TABLE make ADD material_master_id INT NOT NULL');
//        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766E2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('CREATE INDEX IDX_1ACC766E2B2DC1F1 ON make (material_master_id)');
//        $this->addSql('ALTER TABLE model ADD material_master_id INT NOT NULL');
//        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D92B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('CREATE INDEX IDX_D79572D92B2DC1F1 ON model (material_master_id)');
//        $this->addSql('ALTER TABLE transmission ADD material_master_id INT NOT NULL');
//        $this->addSql('ALTER TABLE transmission ADD CONSTRAINT FK_7F87199F2B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('CREATE INDEX IDX_7F87199F2B2DC1F1 ON transmission (material_master_id)');
//        $this->addSql('ALTER TABLE year ADD material_master_id INT NOT NULL');
//        $this->addSql('ALTER TABLE year ADD CONSTRAINT FK_BB8273372B2DC1F1 FOREIGN KEY (material_master_id) REFERENCES material_master (id)');
//        $this->addSql('CREATE INDEX IDX_BB8273372B2DC1F1 ON year (material_master_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE engine DROP FOREIGN KEY FK_E8A81A8D2B2DC1F1');
        $this->addSql('DROP INDEX IDX_E8A81A8D2B2DC1F1 ON engine');
        $this->addSql('ALTER TABLE engine DROP material_master_id');
        $this->addSql('ALTER TABLE make DROP FOREIGN KEY FK_1ACC766E2B2DC1F1');
        $this->addSql('DROP INDEX IDX_1ACC766E2B2DC1F1 ON make');
        $this->addSql('ALTER TABLE make DROP material_master_id');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D92B2DC1F1');
        $this->addSql('DROP INDEX IDX_D79572D92B2DC1F1 ON model');
        $this->addSql('ALTER TABLE model DROP material_master_id');
        $this->addSql('ALTER TABLE transmission DROP FOREIGN KEY FK_7F87199F2B2DC1F1');
        $this->addSql('DROP INDEX IDX_7F87199F2B2DC1F1 ON transmission');
        $this->addSql('ALTER TABLE transmission DROP material_master_id');
        $this->addSql('ALTER TABLE year DROP FOREIGN KEY FK_BB8273372B2DC1F1');
        $this->addSql('DROP INDEX IDX_BB8273372B2DC1F1 ON year');
        $this->addSql('ALTER TABLE year DROP material_master_id');
    }
}
