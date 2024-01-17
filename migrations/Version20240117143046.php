<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240117143046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autre_depenses (id INT AUTO_INCREMENT NOT NULL, offrande_id INT NOT NULL, culte_id INT NOT NULL, titre VARCHAR(50) NOT NULL, montant INT NOT NULL, motif LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F7821987532B2A03 (offrande_id), INDEX IDX_F7821987638A1580 (culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communique (id INT AUTO_INCREMENT NOT NULL, entete VARCHAR(50) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cultes (id INT AUTO_INCREMENT NOT NULL, jour_id INT NOT NULL, moderateur_id INT NOT NULL, predicateur_id INT NOT NULL, interprete_id INT NOT NULL, titre VARCHAR(50) NOT NULL, debut VARCHAR(50) NOT NULL, fin VARCHAR(50) NOT NULL, theme LONGTEXT NOT NULL, reference LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FD1E84BB220C6AD0 (jour_id), INDEX IDX_FD1E84BB20A01F78 (moderateur_id), INDEX IDX_FD1E84BBCCC7BE4A (predicateur_id), INDEX IDX_FD1E84BBF625BF53 (interprete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depenses (id INT AUTO_INCREMENT NOT NULL, culte_id INT NOT NULL, titre VARCHAR(50) NOT NULL, montant INT NOT NULL, motif LONGTEXT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_EE350ECB638A1580 (culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effectifs (id INT AUTO_INCREMENT NOT NULL, culte_id INT NOT NULL, papa INT NOT NULL, maman INT NOT NULL, enfant INT NOT NULL, total INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D144B811638A1580 (culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logistiques (id INT AUTO_INCREMENT NOT NULL, materiel VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, marque VARCHAR(50) NOT NULL, quantite INT NOT NULL, etat VARCHAR(50) NOT NULL, casse VARCHAR(50) NOT NULL, ajout VARCHAR(50) NOT NULL, total INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offrandes (id INT AUTO_INCREMENT NOT NULL, culte_id INT NOT NULL, titre VARCHAR(50) NOT NULL, montant INT NOT NULL, cumul INT NOT NULL, total INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_3C2824A7638A1580 (culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serviteurs (id INT AUTO_INCREMENT NOT NULL, jour VARCHAR(50) NOT NULL, moderateur VARCHAR(50) NOT NULL, orateur VARCHAR(50) NOT NULL, interprete VARCHAR(50) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, age INT NOT NULL, genre VARCHAR(5) NOT NULL, adresse VARCHAR(50) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteurs (id INT AUTO_INCREMENT NOT NULL, culte_id INT NOT NULL, titre VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(50) NOT NULL, reference LONGTEXT NOT NULL, INDEX IDX_DEFA5132638A1580 (culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE autre_depenses ADD CONSTRAINT FK_F7821987532B2A03 FOREIGN KEY (offrande_id) REFERENCES offrandes (id)');
        $this->addSql('ALTER TABLE autre_depenses ADD CONSTRAINT FK_F7821987638A1580 FOREIGN KEY (culte_id) REFERENCES cultes (id)');
        $this->addSql('ALTER TABLE cultes ADD CONSTRAINT FK_FD1E84BB220C6AD0 FOREIGN KEY (jour_id) REFERENCES serviteurs (id)');
        $this->addSql('ALTER TABLE cultes ADD CONSTRAINT FK_FD1E84BB20A01F78 FOREIGN KEY (moderateur_id) REFERENCES serviteurs (id)');
        $this->addSql('ALTER TABLE cultes ADD CONSTRAINT FK_FD1E84BBCCC7BE4A FOREIGN KEY (predicateur_id) REFERENCES serviteurs (id)');
        $this->addSql('ALTER TABLE cultes ADD CONSTRAINT FK_FD1E84BBF625BF53 FOREIGN KEY (interprete_id) REFERENCES serviteurs (id)');
        $this->addSql('ALTER TABLE depenses ADD CONSTRAINT FK_EE350ECB638A1580 FOREIGN KEY (culte_id) REFERENCES cultes (id)');
        $this->addSql('ALTER TABLE effectifs ADD CONSTRAINT FK_D144B811638A1580 FOREIGN KEY (culte_id) REFERENCES cultes (id)');
        $this->addSql('ALTER TABLE offrandes ADD CONSTRAINT FK_3C2824A7638A1580 FOREIGN KEY (culte_id) REFERENCES cultes (id)');
        $this->addSql('ALTER TABLE visiteurs ADD CONSTRAINT FK_DEFA5132638A1580 FOREIGN KEY (culte_id) REFERENCES cultes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autre_depenses DROP FOREIGN KEY FK_F7821987532B2A03');
        $this->addSql('ALTER TABLE autre_depenses DROP FOREIGN KEY FK_F7821987638A1580');
        $this->addSql('ALTER TABLE cultes DROP FOREIGN KEY FK_FD1E84BB220C6AD0');
        $this->addSql('ALTER TABLE cultes DROP FOREIGN KEY FK_FD1E84BB20A01F78');
        $this->addSql('ALTER TABLE cultes DROP FOREIGN KEY FK_FD1E84BBCCC7BE4A');
        $this->addSql('ALTER TABLE cultes DROP FOREIGN KEY FK_FD1E84BBF625BF53');
        $this->addSql('ALTER TABLE depenses DROP FOREIGN KEY FK_EE350ECB638A1580');
        $this->addSql('ALTER TABLE effectifs DROP FOREIGN KEY FK_D144B811638A1580');
        $this->addSql('ALTER TABLE offrandes DROP FOREIGN KEY FK_3C2824A7638A1580');
        $this->addSql('ALTER TABLE visiteurs DROP FOREIGN KEY FK_DEFA5132638A1580');
        $this->addSql('DROP TABLE autre_depenses');
        $this->addSql('DROP TABLE communique');
        $this->addSql('DROP TABLE cultes');
        $this->addSql('DROP TABLE depenses');
        $this->addSql('DROP TABLE effectifs');
        $this->addSql('DROP TABLE logistiques');
        $this->addSql('DROP TABLE offrandes');
        $this->addSql('DROP TABLE serviteurs');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE visiteurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
