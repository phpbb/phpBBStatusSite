<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130112144822 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE checks DROP FOREIGN KEY FK_9F8C0079F6BD1646");
        $this->addSql("DROP INDEX IDX_9F8C0079F6BD1646 ON checks");
        $this->addSql("ALTER TABLE checks CHANGE site_id siteid INT DEFAULT NULL");
        $this->addSql("ALTER TABLE checks ADD CONSTRAINT FK_9F8C0079FCF7805F FOREIGN KEY (siteid) REFERENCES sites (id)");
        $this->addSql("CREATE INDEX IDX_9F8C0079FCF7805F ON checks (siteid)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE checks DROP FOREIGN KEY FK_9F8C0079FCF7805F");
        $this->addSql("DROP INDEX IDX_9F8C0079FCF7805F ON checks");
        $this->addSql("ALTER TABLE checks CHANGE siteid site_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE checks ADD CONSTRAINT FK_9F8C0079F6BD1646 FOREIGN KEY (site_id) REFERENCES sites (id)");
        $this->addSql("CREATE INDEX IDX_9F8C0079F6BD1646 ON checks (site_id)");
    }
}
