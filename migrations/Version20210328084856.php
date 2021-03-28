<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328084856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE make ADD make_id INT NOT NULL');
//        $this->addSql('CREATE INDEX IDX_1ACC766ECFBF73EB ON make (make_id)');
//        $this->addSql('ALTER TABLE make ADD CONSTRAINT FK_1ACC766ECFBF73EB FOREIGN KEY (make_id) REFERENCES material_master (id)');
////        $this->addSql('ALTER TABLE model ADD model_id INT NOT NULL');
//        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D97975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
////        $this->addSql('CREATE INDEX IDX_D79572D97975B7E7 ON model (model_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE make DROP FOREIGN KEY FK_1ACC766ECFBF73EB');
        $this->addSql('DROP INDEX IDX_1ACC766ECFBF73EB ON make');
        $this->addSql('ALTER TABLE make DROP make_id');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D97975B7E7');
        $this->addSql('DROP INDEX IDX_D79572D97975B7E7 ON model');
        $this->addSql('ALTER TABLE model DROP model_id');
    }
}
