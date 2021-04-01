<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322182902 extends AbstractMigration
{
    public function isTransactional(): bool
    {
        return false;
    }
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_production_year (model_id INT NOT NULL, production_year_id INT NOT NULL, INDEX IDX_4FBD36617975B7E7 (model_id), INDEX IDX_4FBD366155D4737A (production_year_id), PRIMARY KEY(model_id, production_year_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE model_production_year ADD CONSTRAINT FK_4FBD36617975B7E7 FOREIGN KEY (model_id) REFERENCES model (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model_production_year ADD CONSTRAINT FK_4FBD366155D4737A FOREIGN KEY (production_year_id) REFERENCES production_year (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE model ADD make_id INT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9CFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('CREATE INDEX IDX_D79572D9CFBF73EB ON model (make_id)');
        $this->addSql('ALTER TABLE product ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD7975B7E7 ON product (model_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE model_production_year');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9CFBF73EB');
        $this->addSql('DROP INDEX IDX_D79572D9CFBF73EB ON model');
        $this->addSql('ALTER TABLE model DROP make_id');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7975B7E7');
        $this->addSql('DROP INDEX IDX_D34A04AD7975B7E7 ON product');
        $this->addSql('ALTER TABLE product DROP model_id');
    }
}
