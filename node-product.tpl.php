<?php
// $Id: node-product.tpl.php,v 1.1.2.3 2009/11/11 05:26:25 sociotech Exp $
?>

<?php
	if ($node->type == 'product') {
	  $arr_sku = uc_stock_skus($node->nid);
	  $stock_html .='<table>';
	  foreach($arr_sku as $sku){
		$stocklevel = uc_stock_level($sku);
		if ($stocklevel) {
		  if ($stocklevel < 1) {
			$stocklevel = '<span class="nostock">'.$stocklevel.'</span>';
		  }
		  $stock_html .='
        <tr><td>SKU: '.$sku.'</td></tr>
        <tr><td><div class="inStockLabel">In Stock!</div><b>'.$stocklevel.'</b> In Australia Ready To Ship Within 24 Hours.</td><td></tr>';
		  
		}
	  }
	  $stock_html .='</table>';
	}
?>

<div id="node-<?php print $node->nid; ?>" class="node clear-block <?php print $node_classes; ?>">
  <div class="inner">
    <?php if ($page == 0): ?>
    <h2 class="title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>

    <?php if ($submitted): ?>
    <div class="meta">
      <!--<span class="submitted"><?php print $submitted ?></span>-->
    </div>
    <?php endif; ?>

    <?php if ($node_top && !$teaser): ?>
    <div id="node-top" class="node-top row nested">
      <div id="node-top-inner" class="node-top-inner inner">
        <?php print $node_top; ?>
      </div><!-- /node-top-inner -->
    </div><!-- /node-top -->
    <?php endif; ?>

    <div id="product-group" class="product-group">
      <div class="images">
        <?php print $fusion_uc_image; ?>
      </div><!-- /images -->

      <div class="content">

	<div id="product-details" class="clear">
          <div id="field-group">
            <?php print $fusion_uc_weight; ?>
            <?php print $fusion_uc_dimensions; ?>
            <?php print $fusion_uc_model; ?>
			<!--
            <?php print $fusion_uc_list_price; ?>
            <?php print $fusion_uc_sell_price; ?>-->
            <?php print $fusion_uc_cost; ?>
          </div>

          <div id="price-group">
            <?php print $fusion_uc_display_price; ?>AUD
            <?php print $fusion_uc_add_to_cart; ?>
			<?php print $stock_html ?> 			
          </div>	  
		  
        </div><!-- /product-details -->   
      </div><!-- /content -->
    </div><!-- /product-group -->

      <div id="content-body">		
        <?php print $fusion_uc_body; ?>		
      </div>

        <?php if ($fusion_uc_additional && !$teaser): ?>
        <div id="product-additional" class="product-additional">
          <?php print $fusion_uc_additional; ?>
        </div>
        <?php endif; ?>

        <?php if ($terms): ?>
        <div class="terms">
          <?php print $terms; ?>
        </div>
        <?php endif;?>

        <?php if ($links && !$teaser): ?>
        <div class="links clear">
          <?php print $links; ?>
        </div>
        <?php endif; ?>


  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div>
