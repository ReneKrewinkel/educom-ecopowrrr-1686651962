<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710084142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE power DROP FOREIGN KEY FK_AB8A01A0B897366B');
        $this->addSql('DROP TABLE date_price');
        $this->addSql('DROP INDEX IDX_AB8A01A0B897366B ON power');
        $this->addSql('ALTER TABLE power ADD date DATETIME NOT NULL, ADD price DOUBLE PRECISION NOT NULL, DROP date_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_price (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE power ADD date_id INT NOT NULL, DROP date, DROP price');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A0B897366B FOREIGN KEY (date_id) REFERENCES date_price (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AB8A01A0B897366B ON power (date_id)');
    }
}
