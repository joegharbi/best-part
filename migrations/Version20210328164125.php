<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210328164125 extends AbstractMigration
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
        $this->addSql('ALTER TABLE model ADD make_id INT NOT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9CFBF73EB FOREIGN KEY (make_id) REFERENCES make (id)');
        $this->addSql('CREATE INDEX IDX_D79572D9CFBF73EB ON model (make_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9CFBF73EB');
        $this->addSql('DROP INDEX IDX_D79572D9CFBF73EB ON model');
        $this->addSql('ALTER TABLE model DROP make_id');
    }
}
