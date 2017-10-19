<?php
/**
 * @author  Richard Alvarez <rawalvarez731@gmail.com>
 */

namespace Welcome\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class MOTDTable 
{

	/**
	 * @var Gateway to the db.
	 */
	protected $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	/**	
	 * Returns all rows of data from the table.
	 * @return array
	 */
	public function getAll()
	{
        $rowset = $this->tableGateway->select();
        return $rowset;
	}

	/**	
	 * Returns a row of data from the table.
	 * @param  int $id
	 * @return row
	 */
	public function getFromId(int $id)
	{
		$id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
	}

}