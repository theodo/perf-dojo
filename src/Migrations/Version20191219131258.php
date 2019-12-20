<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191219131258 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE cat_picture_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE breed_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cat_picture (id INT NOT NULL, breed_id INT DEFAULT NULL, cat_name VARCHAR(255) NOT NULL, cat_picture VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_366ACDDFA8B4A30F ON cat_picture (breed_id)');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, author_name VARCHAR(255) NOT NULL, author_email VARCHAR(255) NOT NULL, text TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE breed (id INT NOT NULL, breed_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cat_picture ADD CONSTRAINT FK_366ACDDFA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cat_picture DROP CONSTRAINT FK_366ACDDFA8B4A30F');
        $this->addSql('DROP SEQUENCE cat_picture_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE breed_id_seq CASCADE');
        $this->addSql('DROP TABLE cat_picture');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE breed');
    }
}
