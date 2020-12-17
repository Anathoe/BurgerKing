<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217075009 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog ADD blog_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143DAE07E97 FOREIGN KEY (blog_id) REFERENCES blog_category (id)');
        $this->addSql('CREATE INDEX IDX_C0155143DAE07E97 ON blog (blog_id)');
        $this->addSql('ALTER TABLE menu ADD menu_catfood_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93BC1731E0 FOREIGN KEY (menu_catfood_id) REFERENCES cat_food (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93BC1731E0 ON menu (menu_catfood_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143DAE07E97');
        $this->addSql('DROP INDEX IDX_C0155143DAE07E97 ON blog');
        $this->addSql('ALTER TABLE blog DROP blog_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93BC1731E0');
        $this->addSql('DROP INDEX IDX_7D053A93BC1731E0 ON menu');
        $this->addSql('ALTER TABLE menu DROP menu_catfood_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
