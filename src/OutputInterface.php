<?php 
declare(strict_types=1);

namespace Hx\Http;

interface OutputInterface {
	
	/**
	 * Send Http response to requestor
	 * @param unknown $data
	 * @param int $statusCode
	 */
	public function generateOutput(int $statusCode, Array $data = null);
	
	/**
	 * Get HTTP output format type
	 * @return string
	 */
	public function getFormatType(): string;
}
?>