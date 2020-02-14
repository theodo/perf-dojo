<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200210152559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE cat_picture RENAME COLUMN breed_id TO skill_id');
        $this->addSql('ALTER TABLE cat_picture RENAME COLUMN cat_name TO name');
        $this->addSql('ALTER TABLE cat_picture RENAME COLUMN cat_picture TO picture');
        $this->addSql('ALTER TABLE cat_picture RENAME COLUMN cat_picture_small TO picture_small');
        $this->addSql('ALTER TABLE breed RENAME COLUMN breed_name TO skill_name');
        $this->addSql('ALTER TABLE cat_picture RENAME TO freelance');
        $this->addSql('ALTER TABLE breed RENAME TO skill');
        $this->addSql('ALTER SEQUENCE cat_picture_id_seq RENAME TO freelance_id_seq');
        $this->addSql('ALTER SEQUENCE breed_id_seq RENAME TO skill_id_seq');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE freelance RENAME COLUMN skill_id TO breed_id');
        $this->addSql('ALTER TABLE freelance RENAME COLUMN name TO cat_name');
        $this->addSql('ALTER TABLE freelance RENAME COLUMN picture TO cat_picture');
        $this->addSql('ALTER TABLE freelance RENAME COLUMN picture_small TO cat_picture_small');
        $this->addSql('ALTER TABLE skill RENAME COLUMN skill_name TO breed_name');
        $this->addSql('ALTER TABLE freelance RENAME TO cat_picture');
        $this->addSql('ALTER TABLE skill RENAME TO breed');
        $this->addSql('ALTER SEQUENCE freelance_id_seq RENAME TO cat_picture_id_seq');
        $this->addSql('ALTER SEQUENCE skill_id_seq RENAME TO breed_id_seq');
    }
}
