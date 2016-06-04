<?php 
declare(strict_types=1);

namespace Hx\Http;

interface OutputServiceInterface {
	
	/**
	 * Generate HTTP output
	 * @param string $outputFormat HTTP output format, json, text, file,...
	 * @param array $data
	 */
	public function generateOutput(string $outputFormat, array $data = null);
}
?>