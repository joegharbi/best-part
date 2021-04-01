<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325093540 extends AbstractMigration
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
        $this->addSql('ALTER TABLE model_year ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE model_year_engine ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE model_year_engine_transmission ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE model_year DROP slug');
        $this->addSql('ALTER TABLE model_year_engine DROP slug');
        $this->addSql('ALTER TABLE model_year_engine_transmission DROP slug');
    }
}
