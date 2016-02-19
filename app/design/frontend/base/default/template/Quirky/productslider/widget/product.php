<?php
$collection = Mage::getResourceModel('catalog/product_collection');

$collection
    ->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
    ->addMinimalPrice()
    ->addFinalPrice()
    ->addTaxPercents()
    ->addUrlRewrite();
$collection->getSelect()->where('sku=?', $this->getSku())->limit(1);
$product = $collection->getFirstItem();

if ( $product->getId() ):

$image_type = $this->getImageType();
$image_width = $this->getImageWidth();
$image_height = $this->getImageHeight();

if (!$image_width) $image_width = 115;		// default width
if (!$image_height) $image_height = 146;	// default height

$product_link = $product->getProductUrl();
$product_name = $this->stripTags($product->getName(), null, true);
$product_image = $this->helper('catalog/image')->init($product, $image_type)->resize($image_width, $image_height);

$product_image_label = $this->getProductAlt();
if ( !$product_image_label ) $product_image_label = $this->stripTags($this->getImageLabel($product, $image_type), null, true);
if ( !$product_image_label ) $product_image_label = $product_name;

$product_price_block = $this->getPriceHtml($product, true);

?>
<a href="<?php echo $product_link; ?>">
    <img
         src="<?php echo $product_image; ?>"
         alt="<?php echo $product_image_label; ?>"
         width="<?php echo $image_width; ?>"
         height="<?php echo $image_height; ?>"
         />
</a>
<h3><a href="<?php echo $product_link; ?>"><?php echo $product_name; ?></a></h3>

<?php echo $product_price_block; ?>
<?php endif;?>
