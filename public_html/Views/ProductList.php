<?php

namespace Views;

require_once('Models/Book.php');
require_once('Models/Disc.php');
require_once('Models/Furniture.php');

use Models\Book;
use Models\Disc;
use Models\Furniture;

class ProductList
{
    public function index()
    {
        $book = new Book();
        $allBooks = $book->get_all_books();

        $disc = new Disc();
        $allDiscs = $disc->get_all_discs();

        $furniture = new Furniture();
        $allFurniture = $furniture->get_all_Furniture();

        $allProducts = array_merge($allBooks, $allDiscs, $allFurniture);
        $ids = array_column($allProducts, 'id');
        array_multisort($ids, SORT_ASC, $allProducts);


        foreach ($allProducts as $product) {
            $table = $product['table'];
?>
            <div id="<?= $product['id'] ?>" class="product <?= $table ?>">
                <input class="delete-checkbox" type="checkbox" name="delete" id="<?= "delete-" . $product['id'] ?>" oninput="checkbox(event)">
                <div hidden>
                    <?= $product['id'] ?>
                </div>
                <div>
                    <?= $product['sku'] ?>
                </div>
                <div>
                    <?= $product['name'] ?>
                </div>
                <div>
                    <?= $product['price'] . " $" ?>
                </div>
                <div>
                    <?= $table === 'Books' ? "Weight: " . $product['weight'] . "KG" : "" ?>
                </div>
                <div>
                    <?= $table === "Discs" ? "Size: " . $product['size'] . "MB" : "" ?>
                </div>
                <div>
                    <?= $table === "Furniture" ? "Dimension: " . $product['height'] . 'x' . $product['width'] . 'x' . $product['length'] : ""; ?>
                </div>
            </div>
<?php
        }
    }
}
?>

<link rel="stylesheet" href="/assests/css/productList.css" />
<script src="/assests/js/massDelete.js" defer></script>