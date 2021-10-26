SELECT produk1.`name` AS Nama_product_1, produk2.`name` AS Nama_product_2 , hrg_promo.`price` AS Harga_promo FROM harga_promo hrg_promo
LEFT JOIN promo ON promo.`id`=hrg_promo.`promo_id`
LEFT JOIN produk produk1 ON produk1.`id`=promo.`produk1_id`
LEFT JOIN produk produk2 ON produk2.`id`=promo.`produk2_id`

