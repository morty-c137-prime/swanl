<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * 
 * This controller gets DI'd to have a MOTDTable that
 * connects to a MOTDTableGateway that conncts to, finally,
 * the db (that being something we condifure in our local file).
 * 
 *  ~ Richard Alvarez
 */

namespace Welcome\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Welcome\Model\MOTD;

class MOTDController extends AbstractActionController
{
	/**	
	 * A MOTD Table
	 * @var MOTDTable
	 */
	protected $table;

	/**	
	 * Sets table to the passed table from the service manager.
	 */
	public function __construct($table)
	{
		$this->table = $table;
	}

    public function displayMOTDAction()
    {
    	$motd = $this->table->getFromId(2);

        return new ViewModel(['motd' => $motd]);
    }
}
