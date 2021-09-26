<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924125105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15B9C7C7DE2');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15BDE18E50E');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15B9C7C7DE1');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15BDE18E50B');
        $this->addSql('DROP INDEX IDX_A2FCC15B9C7C7DE1 ON product_attributes');
        $this->addSql('DROP INDEX IDX_A2FCC15BDE18E50B ON product_attributes');
        $this->addSql('ALTER TABLE product_attributes ADD product_id_id INT NOT NULL, ADD attribute_id_id INT NOT NULL, DROP product_id, DROP attribute_id');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15B9C7C7DE1 FOREIGN KEY (attribute_id_id) REFERENCES attributes (id)');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15BDE18E50B FOREIGN KEY (product_id_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_A2FCC15B9C7C7DE1 ON product_attributes (attribute_id_id)');
        $this->addSql('CREATE INDEX IDX_A2FCC15BDE18E50B ON product_attributes (product_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15BDE18E50B');
        $this->addSql('ALTER TABLE product_attributes DROP FOREIGN KEY FK_A2FCC15B9C7C7DE1');
        $this->addSql('DROP INDEX IDX_A2FCC15BDE18E50B ON product_attributes');
        $this->addSql('DROP INDEX IDX_A2FCC15B9C7C7DE1 ON product_attributes');
        $this->addSql('ALTER TABLE product_attributes ADD product_id INT NOT NULL, ADD attribute_id INT NOT NULL, DROP product_id_id, DROP attribute_id_id');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15B9C7C7DE2 FOREIGN KEY (attribute_id) REFERENCES attributes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15BDE18E50E FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15BDE18E50B FOREIGN KEY (product_id) REFERENCES products (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE product_attributes ADD CONSTRAINT FK_A2FCC15B9C7C7DE1 FOREIGN KEY (attribute_id) REFERENCES attributes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A2FCC15BDE18E50B ON product_attributes (product_id)');
        $this->addSql('CREATE INDEX IDX_A2FCC15B9C7C7DE1 ON product_attributes (attribute_id)');
    }
}
