<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326104026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD model_year_engine_transmission_id INT DEFAULT NULL, ADD model_year_engine_id INT DEFAULT NULL, ADD model_year_id INT DEFAULT NULL, ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADEDB8B4E4 FOREIGN KEY (model_year_engine_transmission_id) REFERENCES model_year_engine_transmission (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9A0F0787 FOREIGN KEY (model_year_engine_id) REFERENCES model_year_engine (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD20529756 FOREIGN KEY (model_year_id) REFERENCES model_year (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADEDB8B4E4 ON product (model_year_engine_transmission_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9A0F0787 ON product (model_year_engine_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD20529756 ON product (model_year_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD7975B7E7 ON product (model_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADEDB8B4E4');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9A0F0787');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD20529756');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7975B7E7');
        $this->addSql('DROP INDEX IDX_D34A04ADEDB8B4E4 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD9A0F0787 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD20529756 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD7975B7E7 ON product');
        $this->addSql('ALTER TABLE product DROP model_year_engine_transmission_id, DROP model_year_engine_id, DROP model_year_id, DROP model_id');
    }
}
