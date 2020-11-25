<?php 
namespace AHT\StoreLocator\Api;


interface LocationManagementInterface {

  /**
     Lấy key của admin Role Administrators hoặc admin có Role Rources Store Locator->Get Stores
   http://127.0.0.1/magento/rest/V1/integration/admin/token?username=admin&password=pass

     - Để lấy toàn bộ store

   http://127.0.0.1/magento/rest/getallstore/

     - Tạo API để lấy về các store được lưu trong bảng của extension StoreLocator (10 kết quả), truyền thêm param để lấy thêm cho các page khác (p=2, p=3...)

          + store[page] = Số trang;

          http://127.0.0.1/magento/rest/getstore/?store[page]=1

       - Lấy về các stores dựa theo các params truyền lên (country, state, city, zipcode)
          + store[country] = country;
          + store[state] = state;
          + store[city] = city;
          + store[zipcode] = zipcode;
       Muốn lấy về store theo param nào thì thêm param đó vào url sau dấu &;
       EX
          http://127.0.0.1/magento/rest/getstore/?store[page]=1&store[country]=VN

          http://127.0.0.1/magento/rest/getstore/?store[page]=1&store[country]=VN&store[city]=Hà Nội

       - Lấy về các stores dựa theo các params (location, radius)

          + store[lat] = lat; Vĩ độ
          + store[lng] = lng; Kinh độ
          + store[radius] = radius;
        EX  
          http://127.0.0.1/magento/rest/getstore/?store[page]=1&store[country]=VN&store[lat]=21.019914

      Phải có 1 params store trên url khi get store có filter
   */

 /**
	 * GET for Post api
	 * @param array $param
	 * @return array
	 */

 public function getStore(array $store);

  /**
    * GET for Post api
    * @param null
    * @return array
    */

  public function getALLStore();
}
