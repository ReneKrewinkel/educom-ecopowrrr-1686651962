<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614105319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type_id INT NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_92FB68E7E3C61F9 (owner_id), INDEX IDX_92FB68EC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE device_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, device_id INT NOT NULL, date DATE NOT NULL, yield INT NOT NULL, consumed INT NOT NULL, INDEX IDX_AB8A01A094A4C7D4 (device_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE device ADD CONSTRAINT FK_92FB68E7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE device ADD CONSTRAINT FK_92FB68EC54C8C93 FOREIGN KEY (type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE power ADD CONSTRAINT FK_AB8A01A094A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id)');
        $this->addSql('ALTER TABLE user ADD bank_detail VARCHAR(50) NOT NULL, ADD postcode VARCHAR(6) NOT NULL, ADD house_number VARCHAR(10) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE device DROP FOREIGN KEY FK_92FB68E7E3C61F9');
        $this->addSql('ALTER TABLE device DROP FOREIGN KEY FK_92FB68EC54C8C93');
        $this->addSql('ALTER TABLE power DROP FOREIGN KEY FK_AB8A01A094A4C7D4');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE device_type');
        $this->addSql('DROP TABLE power');
        $this->addSql('ALTER TABLE user DROP bank_detail, DROP postcode, DROP house_number');
    }
}
