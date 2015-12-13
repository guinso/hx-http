<?php 
namespace Hx\Http;

interface OutputServiceInterface {
	
	public function generateOutput($outputFormat, array $data = null);
}
?>