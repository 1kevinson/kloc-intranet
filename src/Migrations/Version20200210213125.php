<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210213125 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6454C3A3BB');
        $this->addSql('DROP INDEX UNIQ_5399B6454C3A3BB ON receipt');
        $this->addSql('ALTER TABLE receipt DROP payment_id');
        $this->addSql('ALTER TABLE payment ADD receipt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D2B5CA896 FOREIGN KEY (receipt_id) REFERENCES payment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6D28840D2B5CA896 ON payment (receipt_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D2B5CA896');
        $this->addSql('DROP INDEX UNIQ_6D28840D2B5CA896 ON payment');
        $this->addSql('ALTER TABLE payment DROP receipt_id');
        $this->addSql('ALTER TABLE receipt ADD payment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6454C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5399B6454C3A3BB ON receipt (payment_id)');
    }
}
