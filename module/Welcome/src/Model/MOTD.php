<?php
/**
 * @author  Richard Alvarez <rawalvarez731@gmail.com>
 */

namespace Welcome\Model;

use RuntimeException;

class MOTD
{

	/**
	 * Unique id of the MOTD
	 * @var int
	 */
	public $id;

	/**
	 * The MOTD this entity represents
	 * @var string
	 */
	public $message;

	/**
	 * Sets all instance data (probably from a row)
	 * @param  array $data
	 */
	public function exchangeArray(array $data)
    {
        $this->id      = !empty($data['id']) ? $data['id'] : null;
        $this->message = !empty($data['artist']) ? $data['artist'] : null;
    }

	/**
	 * The new message for this MOTD.
	 * @param string $new_message
	 * @return bool 
	 */
	public function set(string $new_message)
	{
		$this->message = $new_message;
		return 1;
	}

	/**
	 * Current message
	 * @return string
	 */
	public function get()
	{		
		return $this->message;
	}

}