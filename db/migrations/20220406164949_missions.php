<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Missions extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {

        /**CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `agent` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `cible` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `planque` int(11) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`agent`) REFERENCES `agent`(`id`),
  FOREIGN KEY (`contact`) REFERENCES `contact`(`id`),
  FOREIGN KEY (`cible`) REFERENCES `cible`(`id`),
  FOREIGN KEY (`planque`) REFERENCES `planque`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 */
        /**
         * Table `missions`
         */
        $table = $this->table('missions');
        $table
            ->addColumn('titre', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('code', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('pays', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('agent', 'integer', [
                'null' => false,
            ])
            ->addColumn('contact', 'integer', [
                'null' => false,
            ])
            ->addColumn('cible', 'integer', [
                'null' => false,
            ])
            ->addColumn('type', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('statut', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('planque', 'integer', [
                'null' => false,
            ])
            ->addColumn('specialite', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('dateDebut', 'date', [
                'null' => false,
            ])
            ->addColumn('dateFin', 'date', [
                'null' => false,
            ]);

    }

    public function down()
    {
        $this->dropTable('missions');
    }
}
