<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181114160641 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE journey (id INT AUTO_INCREMENT NOT NULL, driver_id INT NOT NULL, departure_zone_id INT NOT NULL, arrival_zone_id INT NOT NULL, seats INT NOT NULL, departure_at DATETIME NOT NULL, version INT DEFAULT 1 NOT NULL, INDEX IDX_C816C6A2C3423909 (driver_id), INDEX IDX_C816C6A2850B781A (departure_zone_id), INDEX IDX_C816C6A254E7F1A3 (arrival_zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departure_zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, plate VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, journey_id INT NOT NULL, is_accepted TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, accepted_at DATETIME DEFAULT NULL, INDEX IDX_3B978F9FA76ED395 (user_id), INDEX IDX_3B978F9FD5C9896F (journey_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrival_zone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A2C3423909 FOREIGN KEY (driver_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A2850B781A FOREIGN KEY (departure_zone_id) REFERENCES departure_zone (id)');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A254E7F1A3 FOREIGN KEY (arrival_zone_id) REFERENCES arrival_zone (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FD5C9896F FOREIGN KEY (journey_id) REFERENCES journey (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FD5C9896F');
        $this->addSql('ALTER TABLE journey DROP FOREIGN KEY FK_C816C6A2850B781A');
        $this->addSql('ALTER TABLE journey DROP FOREIGN KEY FK_C816C6A2C3423909');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FA76ED395');
        $this->addSql('ALTER TABLE journey DROP FOREIGN KEY FK_C816C6A254E7F1A3');
        $this->addSql('DROP TABLE journey');
        $this->addSql('DROP TABLE departure_zone');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE arrival_zone');
    }
}
