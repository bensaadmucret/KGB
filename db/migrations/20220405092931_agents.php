<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Agents extends AbstractMigration
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
    public function change(): void
    {

/*CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `code_identification` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NUL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
        $this->table('agent')
            ->addColumn('nom', 'string', ['limit' => 255])
            ->addColumn('prenom', 'string', ['limit' => 255])
            ->addColumn('date_naissance', 'date')
            ->addColumn('code_identification', 'string', ['limit' => 255])
            ->addColumn('nationalite', 'string', ['limit' => 255])
            ->addColumn('specialite', 'string', ['limit' => 255])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('agent');
    }
}
