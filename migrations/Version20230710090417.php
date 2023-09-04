<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710090417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_price (id INT AUTO_INCREMENT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE power ADD date_price_id INT NOT NULL, DROP date, DROP price');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A01521AE41 FOREIGN KEY (date_price_id) REFERENCES date_price (id)');
        $this->addSql('CREATE INDEX IDX_AB8A01A01521AE41 ON power (date_price_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE power DROP FOREIGN KEY FK_AB8A01A01521AE41');
        $this->addSql('DROP TABLE date_price');
        $this->addSql('DROP INDEX IDX_AB8A01A01521AE41 ON power');
        $this->addSql('ALTER TABLE power ADD date DATETIME NOT NULL, ADD price DOUBLE PRECISION NOT NULL, DROP date_price_id');
    }
}
