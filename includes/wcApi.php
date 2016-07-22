<?php
class wcApi {
        /**
     * Constructor.
     */
    public $client;
    public function __construct() {
       
        require_once( '/../WooCommerce-REST-API-Client-Library-master/lib/woocommerce-api.php' );
        $apiDetails = unserialize(get_option( 'rk_setting_values' ));
		//$consumer_key = 'ck_88f2d7dc424150bffc6cd8dbf50bb6bc45275aea';
		//$consumer_secret = 'cs_68ff43ad77f9cab17df48739ccdff207afcc9e92';
                $consumer_key = $apiDetails['api_key'];
                $api_site_url = $apiDetails['api_site_url'];
		$consumer_secret = $apiDetails['api_secrate'];
		$options = array(
                    'ssl_verify'      => false,
                    'timeout'         => 120,
                    'debug'           => true,
                    'return_as_array' => true
		);

		try {

			$this->client = new WC_API_Client( $api_site_url, $consumer_key, $consumer_secret, $options );

			
		} catch ( WC_API_Client_Exception $e ) {

			//echo $e->getMessage() . PHP_EOL;
			//echo $e->getCode() . PHP_EOL;

			if ( $e instanceof WC_API_Client_HTTP_Exception ) {

				print_r( $e->get_request() );
				print_r( $e->get_response() );
			}
		}
    }
    
    
    function import_product($data){
		
            $client = $this->client;    
                
            //print_r($client);    
            
                /*$data = ['product'=>[
    'name' => 'Premium Quality',
	'title' => 'my product name',
	'sku'=>'P0004',
	'status'=>'publish',
    'type' => 'simple',
    'regular_price' => '21.99',
    'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
    'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
    'categories' => [
        [
            'id'=> 9
        ],
        [
            'id'=> 14
        ]
    ],
    'images' => [
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg',
            'position' => 0
        ],
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg',
            'position' => 1
        ]
    ]
]];*/
			
			//print_r($data);exit;

//$list = $client->products->get();
//print_r($list);
            try {
            $response = $client->products->create($data);            
            return $response;

            } catch ( WC_API_Client_Exception $e ) {

               // echo $e->getMessage() . PHP_EOL;
               // echo $e->getCode() . PHP_EOL;

                if ( $e instanceof WC_API_Client_HTTP_Exception ) {

                       // print_r( $e->get_request() );
                        //print_r( $e->get_response() );
                    
                     
                }
                return  $e->get_response();
               
            }
	} //fun import_product
        
        
     function getAllProduct(){
            try {
            $response = $this->client->products->get('',array( 'filter[limit]' => -1 ));         
            return $response;

            }catch ( WC_API_Client_Exception $e ) {
                return  $e->get_response();
            }         
     }// fun getProduct   
      
     
     
     public function export_csv($headers,$data,$filename="rk_wc_sample.csv") {
        ob_get_clean();
        header('Content-Type: text/csv');
        header("Content-Disposition:attachment;filename={$filename}"); 
        header('Expires: 0');  
        header('Cache-Control: no-cache'); 
         $output = fopen("php://output",'w') or die("Can't open php://output");
         
        fputcsv($output, $headers);
        $imploadedata = '';
        foreach($data as $key=>$product) {
            $array_values = array();
            $array_values = array_values($product);
            foreach( $array_values as $v_key=>$v_val){
                if(is_array($v_val)){
                    $array_values[$v_key] = $this->formate_values($v_val);
                }
            }
            fputcsv($output, $array_values );            
        }
         
        $streamSize = ob_get_length(); 
        fclose($output) or die("Can't close php://output");
        header('Content-Length: '.$streamSize);
        exit;
     }
     
     function formate_values($data){       //print_r($data);    
         return '';
         return (implode("|", array_values($data)));
     }
}
