<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240716095629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FB08EDF6');
        $this->addSql('ALTER TABLE subject_trainer DROP FOREIGN KEY FK_6097A482FB08EDF6');
        $this->addSql('DROP TABLE trainer');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FB08EDF6');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE subject_trainer DROP FOREIGN KEY FK_6097A482FB08EDF6');
        $this->addSql('ALTER TABLE subject_trainer ADD CONSTRAINT FK_6097A482FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD discr VARCHAR(255) NOT NULL, ADD first_name VARCHAR(100) DEFAULT NULL, ADD last_name VARCHAR(100) DEFAULT NULL, ADD profession VARCHAR(255) DEFAULT NULL, ADD bio LONGTEXT DEFAULT NULL, ADD stars SMALLINT DEFAULT NULL, ADD grade VARCHAR(255) DEFAULT NULL, ADD age DOUBLE PRECISION DEFAULT NULL, ADD domain VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trainer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, profession VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, bio LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, stars SMALLINT DEFAULT NULL, discr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, grade VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, age DOUBLE PRECISION DEFAULT NULL, domain VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FB08EDF6');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('ALTER TABLE subject_trainer DROP FOREIGN KEY FK_6097A482FB08EDF6');
        $this->addSql('ALTER TABLE subject_trainer ADD CONSTRAINT FK_6097A482FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP discr, DROP first_name, DROP last_name, DROP profession, DROP bio, DROP stars, DROP grade, DROP age, DROP domain');
    }
}
