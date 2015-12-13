<?php 
namespace Hx\Http;

interface OutputServiceInterface {
	
	public function generateOutput($outputFormat, array $data = null);
	
	//public function registerPlugin(OutputInterface $plugin);
	
	//public function removePlugin($formatType);
	
	//public function getPlugin($formatType);
}
?>