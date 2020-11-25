<?php 
namespace AHT\StoreLocator\Api;
 
 
interface LocationManagementInterface {


	/**
	 * GET for Post api
	 * @param string $param
	 * @return string
	 */
	
	public function getStore(array $store);
}