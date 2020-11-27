<?php 
namespace AHT\StoreLocator\Model\Api;
use AHT\StoreLocator\Api\LocationManagementInterface;
use MGS\StoreLocator\Model\StoreFactory;



class StoreApiRepository{

	protected $_storeFactory;

	private $_store;

	private $_collection;

	public function __construct(
		StoreFactory $storeFactory
	) {
		$this->_storeFactory = $storeFactory;
	}

	public function getStore(array $store)
	{
		$this->_store = $store;

		$page = isset($this->_store['page'])?$this->_store['page']:1;

		$collection = $this->_storeFactory->create()->getCollection()
		->setPageSize(10)
		->setCurPage($page);

		$this->_collection = $collection;

		$this->toFilterLike('country');
		$this->toFilterLike('state');
		$this->toFilterLike('city');
		$this->toFilterEq('zipcode');

		$this->toFilterEq('lat');
		$this->toFilterEq('lng');
		$this->toFilterEq('radius');

		return $collection->getData();

	}

	public function getALLStore()
	{
		$collection = $this->_storeFactory->create()->getCollection();
		return $collection->getData();
	}

	public function toFilterLike(String $field){
		if (isset($this->_store[$field])) {
			$this->_collection->addFieldToFilter($field, array('like' => '%'.$this->_store[$field].'%'));
		}
	}

	public function toFilterEq(String $field){
		if (isset($this->_store[$field])) {
			$this->_collection->addFieldToFilter($field, array('eq' => $this->_store[$field]));
		}
	}


}
