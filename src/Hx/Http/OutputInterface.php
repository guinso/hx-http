<?php 
namespace Hx\Http;

interface OutputInterface {
	
	/**
	 * Send Http response to requestor
	 * @param unknown $data
	 * @param int $statusCode
	 */
	public function generateOutput($statusCode, Array $data = null);
	
	/**
	 * Get generated output format type
	 */
	public function getFormatType();
}
?>