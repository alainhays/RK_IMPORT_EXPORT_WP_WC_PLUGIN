<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * WC_Admin class.
 */
class RK_page_contents {

	/**
	 * Constructor.
	 */
	public function __construct() {				
		$this->output();
	}
	
	public function output(){
		?>
			
		<div class="wrap rk_plugin">
			<div class="bs-example">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#sectionA">Section A</a></li>
				<li><a data-toggle="tab" href="#sectionB">Section B</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
						<li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
					</ul>
				</li>
			</ul>
			<div class="tab-content">
			<i class="icon-compass"></i> icon-compass
			<i class="icon-sort-by-order"></i> icon-sort-by-order
				<div id="sectionA" class="tab-pane fade in active">
					<h3>Section A</h3>
					<p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
				</div>
				<div id="sectionB" class="tab-pane fade">
					<h3>Section B</h3>
					<p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
				</div>
				<div id="dropdown1" class="tab-pane fade">
					<h3>Dropdown 1</h3>
					<p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
				</div>
				<div id="dropdown2" class="tab-pane fade">
					<h3>Dropdown 2</h3>
					<p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
				</div>
			</div>
		</div>
		</div>
			
	<?php
		
		
	}
}

new RK_page_contents();
?>

