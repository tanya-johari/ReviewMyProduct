<!-- Special Price -->
<?php
    session_start();
    $_SESSION['counter']=0;
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
        $_SESSION['itemid']= $_POST['item_id'];
        
     
    if (isset($_POST['special_price_submit'])){
        $Product->addTou($_POST['user_id'], $_POST['item_id']);
    }
}
function getProduct($item_id = null, $table= 'product'){
    if (isset($item_id) || $_SERVER["REQUEST_METHOD"]=="POST"){
        $catselected = $_POST['category'];
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id} AND category = '$catselected'");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        

        return $resultArray;
    }
}

$in_cart =getproduct();
include "../partials/connection.php";
$sql1 = "SELECT DISTINCT category FROM product";
$res = $conn->query($sql1);

?>

<form method="post">
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">PRODUCTS</h4>
     
        <label><h4>Select Category : </h4></label>

<select id="category" name="category">
<?php while($cat = $res->fetch_assoc()) { ?>
  <option value="catsel"><?php echo $cat['category']?></option>
<?php } ?>
</select>
</form>
        <div class="grid">
            <?php array_map(function ($item) use($in_cart){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        
                        <a href="products.php?itemid=<?php echo $item['item_id']; ?>&itemname=<?php echo $item['item_name']; ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                            </div>
                            <form method="post">
                                
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
