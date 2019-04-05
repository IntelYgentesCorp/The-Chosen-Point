<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190404173206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE arrival_zone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE departure_zone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE journey_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sfuser_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE arrival_zone (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE departure_zone (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE journey (id INT NOT NULL, driver_id INT NOT NULL, departure_zone_id INT NOT NULL, arrival_zone_id INT NOT NULL, seats INT NOT NULL, departure_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, version INT DEFAULT 1 NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C816C6A2C3423909 ON journey (driver_id)');
        $this->addSql('CREATE INDEX IDX_C816C6A2850B781A ON journey (departure_zone_id)');
        $this->addSql('CREATE INDEX IDX_C816C6A254E7F1A3 ON journey (arrival_zone_id)');
        $this->addSql('CREATE TABLE request (id INT NOT NULL, user_id INT NOT NULL, journey_id INT NOT NULL, is_accepted BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3B978F9FA76ED395 ON request (user_id)');
        $this->addSql('CREATE INDEX IDX_3B978F9FD5C9896F ON request (journey_id)');
        $this->addSql('CREATE TABLE sfuser (id INT NOT NULL, plate VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A2C3423909 FOREIGN KEY (driver_id) REFERENCES sfuser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A2850B781A FOREIGN KEY (departure_zone_id) REFERENCES departure_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE journey ADD CONSTRAINT FK_C816C6A254E7F1A3 FOREIGN KEY (arrival_zone_id) REFERENCES arrival_zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FA76ED395 FOREIGN KEY (user_id) REFERENCES sfuser (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FD5C9896F FOREIGN KEY (journey_id) REFERENCES journey (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE journey DROP CONSTRAINT FK_C816C6A254E7F1A3');
        $this->addSql('ALTER TABLE journey DROP CONSTRAINT FK_C816C6A2850B781A');
        $this->addSql('ALTER TABLE request DROP CONSTRAINT FK_3B978F9FD5C9896F');
        $this->addSql('ALTER TABLE journey DROP CONSTRAINT FK_C816C6A2C3423909');
        $this->addSql('ALTER TABLE request DROP CONSTRAINT FK_3B978F9FA76ED395');
        $this->addSql('DROP SEQUENCE arrival_zone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE departure_zone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE journey_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE request_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sfuser_id_seq CASCADE');
        $this->addSql('DROP TABLE arrival_zone');
        $this->addSql('DROP TABLE departure_zone');
        $this->addSql('DROP TABLE journey');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE sfuser');
    }
}
