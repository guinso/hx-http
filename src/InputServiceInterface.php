<?php 
declare(strict_types=1);

namespace Hx\Http;

interface InputServiceInterface {
	
	/**
	 * Get Http incoming request information
	 * @param HeaderReaderInterface $headerReader HTTP request header
	 * @return array
	 */
	public function getInput(HeaderReaderInterface $headerReader): array;
}
?>