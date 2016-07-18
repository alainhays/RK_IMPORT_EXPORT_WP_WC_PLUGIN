<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * WC_Admin class.
 */
require_once '/../../includes/wcApi.php';
class RK_page_contents extends wcApi  {
    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
        $action_method = (isset($_REQUEST['action_method'])) ? $_REQUEST['action_method'] : 'output';
        $this->$action_method();
    }    
    
    function csv_to_array($filename='', $delimiter=','){
        if(!file_exists($filename) || !is_readable($filename)){
             die("Error: csv file not found.");
        }

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    } 
    
        
    
       public function import_csv_data() {
        header( 'Content-type: text/html; charset=utf-8' );
           $fullsize_path =   get_attached_file( $_REQUEST['file_id'] );
           
           if(file_exists($fullsize_path)){               
                         $fileData=$this->csv_to_array($fullsize_path,",");                        
                         $noOfLines = count($fileData);        

                         if ($noOfLines > 0) {
                            foreach($fileData as $key=>$val){
                               
                                $response =  $this->import_product($val);
                                if($response == 'success'){
                                echo "<div class='alert alert-success' role='alert'><pre>{$response}</pre></div>";
                                }else{
                                 echo "<div class='alert alert-danger' role='alert'><pre>{$response}</pre></div>";   
                                }
  flush();
    ob_flush();
    sleep(1);
                            }
                         }else {
                             die("error: records not found");
                         }
           }else{
               die("Error: csv file not found.");
           }
         
           //print_r($_REQUEST);
       } 
    
    
    public function output() {
        ?>

        <div class="wrap rk_plugin">
            <div class="bs-example">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sectionA"><h2>WooCommerce Import Export Plugin</h2></a></li>
                    <!--li><a data-toggle="tab" href="#sectionB">Section B</a></li-->

                </ul>
                <div class="tab-content">

                    <div id="sectionA" class="tab-pane fade in active">


                        <div class="divider"></div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Info
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <!-- contains goes here -->
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            Product Import
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="info file_info"></div>
<div class="container-fluid">
<form action="" name="import_frm" id="import_frm" method="post" enctype="multipart/form-data">
<?php
//upload form
$this->do_action_upload_form();
?>   
<input type='hidden' name='action_method' value='import_csv_data'>

<input type='submit' class="rk_import_btn btn btn-info btn-lg " style="background-color: #000000;" value='IMPORT'>

</form>
</div>



                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            Export
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <h3>Coming....fy!</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>

        <?php
    }
    function do_action_upload_form() {

        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }
        ?>




            <!--i class="fa fa-file-excel-o fa-6"></i -->
            
                <h3 class="h3"><label>SELECT FILE TO IMPORT</label></h3>
                <input class="header_logo_url input-lg" type="text" name="header_logo" size="60" value="">
                <a href="#" class="rk_upload_file btn btn-info btn-lg" role="button">CHOOSE FILE</a>

               

         



            <script type="text/javascript">
                var ajaxurl = "<?php echo admin_url('admin-ajax.php') . "?page=rk-admin-dashboard&rk_action=upload"; ?>";
            </script>

        <?php
    }
    
    
   
    
    
    
}
new RK_page_contents();
?>

