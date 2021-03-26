<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326153040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_model (id INT AUTO_INCREMENT NOT NULL, part_id INT NOT NULL, model_id INT NOT NULL, INDEX IDX_44E6253A4CE34BEC (part_id), INDEX IDX_44E6253A7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A4CE34BEC FOREIGN KEY (part_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE part_model ADD CONSTRAINT FK_44E6253A7975B7E7 FOREIGN KEY (model_id) REFERENCES model_year_engine_transmission (id)');
        $this->addSql('ALTER TABLE engine DROP slug');
        $this->addSql('ALTER TABLE make DROP slug');
        $this->addSql('ALTER TABLE model DROP slug');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD20529756');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD7975B7E7');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD9A0F0787');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADCFBF73EB');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADEDB8B4E4');
        $this->addSql('DROP INDEX IDX_D34A04ADEDB8B4E4 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD20529756 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADCFBF73EB ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD9A0F0787 ON product');
        $this->addSql('DROP INDEX IDX_D34A04AD7975B7E7 ON product');
        $this->addSql('ALTER TABLE product DROP model_year_engine_transmission_id, DROP model_year_engine_id, DROP model_year_id, DROP model_id, DROP make_id, DROP available');
        $this->addSql('ALTER TABLE transmission DROP slug');
        $this->addSql('ALTER TABLE year DROP slug');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_model');
        $this->addSql('ALTER TABLE engine ADD slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE make ADD slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE model ADD slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE product ADD model_year_engine_transmission_id INT DEFAULT NULL, ADD model_year_engine_id INT DEFAULT NULL, ADD model_year_id INT DEFAULT NULL, ADD model_id INT DEFAULT NULL, ADD make_id INT DEFAULT NULL, ADD available TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD20529756 FOREIGN KEY (model_year_id) REFERENCES model_year (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9A0F0787 FOREIGN KEY (model_year_engine_id) REFERENCES model_year_engine (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADCFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADEDB8B4E4 FOREIGN KEY (model_year_engine_transmission_id) REFERENCES model_year_engine_transmission (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADEDB8B4E4 ON product (model_year_engine_transmission_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD20529756 ON product (model_year_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADCFBF73EB ON product (make_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9A0F0787 ON product (model_year_engine_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD7975B7E7 ON product (model_id)');
        $this->addSql('ALTER TABLE transmission ADD slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE year ADD slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
