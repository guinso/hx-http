<?php 
declare(strict_types=1);

namespace Hx\Http;

interface HeaderReaderInterface {
	
	/**
	 * Get Http content type
	 * @return string
	 */
	public function getContentType(): string;
	
	/**
	 * Get Http method
	 * @return string
	 */
	public function getMethod(): string;
	
	/**
	 * Get Http request URI
	 * @return string
	 */
	public function getRequestUri(): string;
}
?>