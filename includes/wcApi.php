<?php
class wcApi {
        /**
     * Constructor.
     */
    public $client;
    public function __construct() {
       
        require_once( '/../WooCommerce-REST-API-Client-Library-master/lib/woocommerce-api.php' );
		$consumer_key = 'ck_88f2d7dc424150bffc6cd8dbf50bb6bc45275aea';
		$consumer_secret = 'cs_68ff43ad77f9cab17df48739ccdff207afcc9e92';
		$options = array(
			'ssl_verify'      => false,
		);

		try {

			$this->client = new WC_API_Client( 'http://wp.ravikatre.in', $consumer_key, $consumer_secret, $options );

			
		} catch ( WC_API_Client_Exception $e ) {

			echo $e->getMessage() . PHP_EOL;
			echo $e->getCode() . PHP_EOL;

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

                echo $e->getMessage() . PHP_EOL;
                echo $e->getCode() . PHP_EOL;

                if ( $e instanceof WC_API_Client_HTTP_Exception ) {

                       // print_r( $e->get_request() );
                        //print_r( $e->get_response() );
                    
                     
                }
                return  print_r( $e->get_response());
               
            }
	} 
        
        
        
        
        
}
