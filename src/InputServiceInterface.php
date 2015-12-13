<?php 
namespace Hx\Http;

interface InputServiceInterface {
	
	public function getInput(HeaderReaderInterface $headerReader);
}
?>