<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210814131755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tax (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(255) NOT NULL, month VARCHAR(255) NOT NULL, hot_wc DOUBLE PRECISION NOT NULL, hot_kitchen DOUBLE PRECISION NOT NULL, cold_wc DOUBLE PRECISION NOT NULL, cold_kitchen DOUBLE PRECISION NOT NULL, electric INT NOT NULL, tax DOUBLE PRECISION NOT NULL, fund DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE counter_data');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE counter_data (F_ID INT AUTO_INCREMENT NOT NULL, F_YEAR DATE DEFAULT \'NULL\', F_MONTH NUMERIC(2, 0) DEFAULT \'NULL\', F_HOT_WC NUMERIC(5, 2) DEFAULT \'NULL\', F_COLD_WC NUMERIC(5, 2) DEFAULT \'NULL\', F_HOT_KITCHEN NUMERIC(5, 2) DEFAULT \'NULL\', F_COLD_KITHCEN NUMERIC(5, 2) DEFAULT \'NULL\', F_ELECTRIC NUMERIC(5, 0) DEFAULT \'NULL\', F_TAX NUMERIC(7, 3) DEFAULT \'NULL\', PRIMARY KEY(F_ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE tax');
    }
}
