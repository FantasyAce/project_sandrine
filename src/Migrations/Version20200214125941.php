<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200214125941 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media ADD is_in_gallery TINYINT(1) DEFAULT NULL, CHANGE added_at added_at DATETIME DEFAULT NULL, CHANGE is_in_carousel is_in_carousel TINYINT(1) DEFAULT NULL, CHANGE place_carousel place_carousel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE super_user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE media DROP is_in_gallery, CHANGE added_at added_at DATETIME DEFAULT \'NULL\', CHANGE is_in_carousel is_in_carousel TINYINT(1) DEFAULT \'NULL\', CHANGE place_carousel place_carousel INT DEFAULT NULL');
        $this->addSql('ALTER TABLE super_user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
