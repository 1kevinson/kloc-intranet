<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210212221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document ADD tenant_id INT DEFAULT NULL, ADD file_path VARCHAR(255) NOT NULL, ADD file_name VARCHAR(255) NOT NULL, ADD date_added DATETIME NOT NULL, ADD author VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769033212A FOREIGN KEY (tenant_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D8698A769033212A ON document (tenant_id)');
        $this->addSql('ALTER TABLE room ADD house_id INT DEFAULT NULL, ADD number INT NOT NULL, ADD room_size INT NOT NULL, ADD room_state VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B6BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('CREATE INDEX IDX_729F519B6BB74515 ON room (house_id)');
        $this->addSql('ALTER TABLE house ADD owner_id INT DEFAULT NULL, ADD rental_status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_67D5399D7E3C61F9 ON house (owner_id)');
        $this->addSql('ALTER TABLE receipt ADD payment_id INT DEFAULT NULL, ADD tenant_id INT DEFAULT NULL, ADD reference VARCHAR(255) NOT NULL, ADD author VARCHAR(255) NOT NULL, ADD content LONGTEXT NOT NULL, ADD period VARCHAR(255) NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD amount VARCHAR(255) NOT NULL, ADD signature VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6454C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6459033212A FOREIGN KEY (tenant_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5399B6454C3A3BB ON receipt (payment_id)');
        $this->addSql('CREATE INDEX IDX_5399B6459033212A ON receipt (tenant_id)');
        $this->addSql('ALTER TABLE payment ADD owner_id INT DEFAULT NULL, ADD tenant_id INT DEFAULT NULL, ADD room_id INT DEFAULT NULL, ADD period VARCHAR(255) NOT NULL, ADD payment_status VARCHAR(255) NOT NULL, ADD amount INT NOT NULL, ADD payment_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D9033212A FOREIGN KEY (tenant_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_6D28840D7E3C61F9 ON payment (owner_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D9033212A ON payment (tenant_id)');
        $this->addSql('CREATE INDEX IDX_6D28840D54177093 ON payment (room_id)');
        $this->addSql('ALTER TABLE request ADD tenant_id INT DEFAULT NULL, ADD request_reason VARCHAR(255) NOT NULL, ADD date_created DATETIME NOT NULL, ADD date_modify DATETIME NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F9033212A FOREIGN KEY (tenant_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3B978F9F9033212A ON request (tenant_id)');
        $this->addSql('ALTER TABLE contract_detail ADD contract_id INT NOT NULL');
        $this->addSql('ALTER TABLE contract_detail ADD CONSTRAINT FK_12469ADE2576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_12469ADE2576E0FD ON contract_detail (contract_id)');
        $this->addSql('ALTER TABLE user ADD room_id INT DEFAULT NULL, ADD contract_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64954177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64954177093 ON user (room_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492576E0FD ON user (contract_id)');
        $this->addSql('ALTER TABLE contract ADD owner_id INT DEFAULT NULL, ADD room_id INT DEFAULT NULL, ADD reference VARCHAR(255) NOT NULL, ADD date_start DATE NOT NULL, ADD date_end DATE NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD author VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28597E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F285954177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_E98F28597E3C61F9 ON contract (owner_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E98F285954177093 ON contract (room_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F28597E3C61F9');
        $this->addSql('ALTER TABLE contract DROP FOREIGN KEY FK_E98F285954177093');
        $this->addSql('DROP INDEX IDX_E98F28597E3C61F9 ON contract');
        $this->addSql('DROP INDEX UNIQ_E98F285954177093 ON contract');
        $this->addSql('ALTER TABLE contract DROP owner_id, DROP room_id, DROP reference, DROP date_start, DROP date_end, DROP status, DROP author');
        $this->addSql('ALTER TABLE contract_detail DROP FOREIGN KEY FK_12469ADE2576E0FD');
        $this->addSql('DROP INDEX UNIQ_12469ADE2576E0FD ON contract_detail');
        $this->addSql('ALTER TABLE contract_detail DROP contract_id');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769033212A');
        $this->addSql('DROP INDEX IDX_D8698A769033212A ON document');
        $this->addSql('ALTER TABLE document DROP tenant_id, DROP file_path, DROP file_name, DROP date_added, DROP author');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399D7E3C61F9');
        $this->addSql('DROP INDEX IDX_67D5399D7E3C61F9 ON house');
        $this->addSql('ALTER TABLE house DROP owner_id, DROP rental_status');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D7E3C61F9');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D9033212A');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D54177093');
        $this->addSql('DROP INDEX IDX_6D28840D7E3C61F9 ON payment');
        $this->addSql('DROP INDEX IDX_6D28840D9033212A ON payment');
        $this->addSql('DROP INDEX IDX_6D28840D54177093 ON payment');
        $this->addSql('ALTER TABLE payment DROP owner_id, DROP tenant_id, DROP room_id, DROP period, DROP payment_status, DROP amount, DROP payment_date');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6454C3A3BB');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6459033212A');
        $this->addSql('DROP INDEX UNIQ_5399B6454C3A3BB ON receipt');
        $this->addSql('DROP INDEX IDX_5399B6459033212A ON receipt');
        $this->addSql('ALTER TABLE receipt DROP payment_id, DROP tenant_id, DROP reference, DROP author, DROP content, DROP period, DROP status, DROP amount, DROP signature');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9F9033212A');
        $this->addSql('DROP INDEX IDX_3B978F9F9033212A ON request');
        $this->addSql('ALTER TABLE request DROP tenant_id, DROP request_reason, DROP date_created, DROP date_modify, DROP status, DROP content');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B6BB74515');
        $this->addSql('DROP INDEX IDX_729F519B6BB74515 ON room');
        $this->addSql('ALTER TABLE room DROP house_id, DROP number, DROP room_size, DROP room_state');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64954177093');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492576E0FD');
        $this->addSql('DROP INDEX IDX_8D93D64954177093 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6492576E0FD ON user');
        $this->addSql('ALTER TABLE user DROP room_id, DROP contract_id');
    }
}
