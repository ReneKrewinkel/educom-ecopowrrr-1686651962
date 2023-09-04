<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230619125052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE power ADD date_id INT NOT NULL');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A0B897366B FOREIGN KEY (date_id) REFERENCES date_price (id)');
        $this->addSql('CREATE INDEX IDX_AB8A01A0B897366B ON power (date_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE power DROP FOREIGN KEY FK_AB8A01A0B897366B');
        $this->addSql('DROP INDEX IDX_AB8A01A0B897366B ON power');
        $this->addSql('ALTER TABLE power DROP date_id');
    }
}
