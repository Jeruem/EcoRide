<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250210104010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, ride_id INT DEFAULT NULL, passengers_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_E00CEDDE302A8A70 (ride_id), INDEX IDX_E00CEDDEDAEC2A17 (passengers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE302A8A70 FOREIGN KEY (ride_id) REFERENCES ride (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEDAEC2A17 FOREIGN KEY (passengers_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE302A8A70');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEDAEC2A17');
        $this->addSql('DROP TABLE booking');
    }
}
