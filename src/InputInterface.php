<?php 
namespace Hx\Http;

interface InputInterface {
	/**
	 * Get Http request information
	 * @param string $method
	 * @return array
	 */
	public function getInput(string $method): array;
}
?>