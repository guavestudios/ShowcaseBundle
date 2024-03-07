<?php

namespace Guave\ShowcaseBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;

class MoveTagTableMigration extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_showcase_tag'])) {
            return false;
        }

        return true;
    }

    public function run(): MigrationResult
    {
        $this->connection->executeQuery("RENAME TABLE `tl_showcase_tag` TO `tl_tag`;");

        return $this->createResult(true, 'Moved tl_showcase_tag table to tl_tag.');
    }
}
