<?php
$products = [
    [
        'name' => 'SIMGOT EW300',
        'category' => 'IEM',
        'price' => 1499000,
        'stock' => 8,
        'image' => 'https://cdn.shopify.com/s/files/1/0421/5432/8214/files/SIMGOT_EW300_IEM_01.webp?v=1726046082',
        'description' => '1DD + 1 Planar + 1 PZT tribrid IEM dengan nozzle tuning yang dapat diganti.'
    ],
    [
        'name' => 'TINHIFI T6',
        'category' => 'IEM',
        'price' => 1899000,
        'stock' => 5,
        'image' => 'https://ueeshop.ly200-cdn.com/u_file/UPAR/UPAR372/2609/14/products/055.jpg?x-oss-process=image/format,webp/quality,q_100',
        'description' => 'Hybrid IEM 1DD + 1 planar dengan faceplate kayu dan koneksi modular.'
    ],
    [
        'name' => 'INAWAKEN DAWN Ms',
        'category' => 'IEM',
        'price' => 799000,
        'stock' => 10,
        'image' => 'https://www.linsoul.com/cdn/shop/files/IMG_6881.jpg?v=1724225999&width=1100',
        'description' => 'IEM single dynamic driver 11.2mm dengan diaphragm purple-gold.'
    ],
    [
        'name' => 'EPZ TP35 Pro',
        'category' => 'DAC',
        'price' => 1299000,
        'stock' => 0,
        'image' => 'https://epzaudio.com/cdn/shop/files/TP35PRO-GLD.png?v=1774431969&width=2000',
        'description' => 'Portable DAC/Amp dengan dual CS43198, output 3.5mm dan 4.4mm.'
    ],
    [
        'name' => 'FiiO SNOWSKY Melody',
        'category' => 'DAC',
        'price' => 1199000,
        'stock' => 6,
        'image' => 'https://www.pbtech.co.nz/imgprod/A/U/AUDFIO5510306__5.jpg?h=2197541427',
        'description' => 'Portable DAC/AMP dengan housing kayu dan dual CS43131.'
    ],
    [
        'name' => 'KEFINE Arnar',
        'category' => 'IEM',
        'price' => 2999000,
        'stock' => 2,
        'image' => 'https://cdn.shopify.com/s/files/1/0421/5432/8214/files/kefine-arnar-iem-4.webp?v=1775725025',
        'description' => 'Hybrid IEM 1 planar 14.5mm + 1 Knowles BA dengan nozzle tuning.'
    ],
];

$totalProducts = count($products);

function rupiah($price) {
    return 'Rp' . number_format($price, 0, ',', '.');
}

function finalPrice($price) {
    return $price >= 1000000 ? $price * 0.90 : $price;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Katalog IEM dan DAC - PAW Modul 1">
    <title>Cia Store | Katalog IEM & DAC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <a class="brand" href="#home">
            <span class="brand-mark">CS</span>
            <span>Cia Store</span>
        </a>
        <nav>
            <a href="#home">Home</a>
            <a href="#products">Produk</a>
            <a href="#about">Tentang</a>
        </nav>
    </header>

    <main id="home">
        <section class="hero">
            <div class="hero-copy">
                <h1>Temukan suara yang cocok dengan <span>setup</span> kamu.</h1>
                <p>Katalog sederhana untuk IEM dan DAC pilihan.</p>
                <a class="hero-button" href="#products">Lihat Produk <span>↓</span></a>
            </div>
            <div class="hero-card">
                <div class="hero-orbit"></div>
                <div class="hero-device">♪</div>
                <div class="hero-mini-card">
                    <strong><?= $totalProducts ?> Produk</strong>
                    <span>IEM & DAC</span>
                </div>
            </div>
        </section>

        <section class="stats" aria-label="Ringkasan katalog">
            <div class="stat-card"><strong><?= $totalProducts ?></strong><span>Total Produk</span></div>
            <div class="stat-card"><strong>4</strong><span>IEM</span></div>
            <div class="stat-card"><strong>2</strong><span>DAC</span></div>
            <div class="stat-card"><strong>10%</strong><span>Diskon ≥ Rp1 Juta</span></div>
        </section>

        <section id="products" class="catalog">
            <div class="section-heading">
                <div>
                    <h2>Produk Pilihan</h2>
                </div>
            </div>

            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php
                        $available = $product['stock'] > 0;
                        $discounted = $product['price'] >= 1000000;
                        $afterDiscount = finalPrice($product['price']);
                    ?>
                    <article class="product-card">
                        <div class="product-image-wrap">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy">
                            <span class="category-badge"><?= htmlspecialchars($product['category']) ?></span>
                            <?php if ($discounted): ?>
                                <span class="discount-badge">DISKON 10%</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-content">
                            <div class="product-topline">
                                <span><?= $available ? '● Tersedia' : '● Stok Habis' ?></span>
                                <small>Stok: <?= $product['stock'] ?></small>
                            </div>
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p><?= htmlspecialchars($product['description']) ?></p>

                            <div class="price-area">
                                <?php if ($discounted): ?>
                                    <span class="normal-price">Harga normal <?= rupiah($product['price']) ?></span>
                                    <div class="price-row">
                                        <strong><?= rupiah($afterDiscount) ?></strong>
                                        <span class="discount-label">-10%</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price-row"><strong><?= rupiah($product['price']) ?></strong></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($available): ?>
                                <button class="buy-button" type="button" onclick="buyProduct('<?= htmlspecialchars($product['name'], ENT_QUOTES) ?>')">Beli Sekarang</button>
                            <?php else: ?>
                                <button class="buy-button disabled" type="button" disabled>Stok Habis</button>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="about" class="about">
            <div>
                <h2></h2>
            </div>
        </section>
    </main>

    <footer>
        <div><strong>Cia Store</strong></div>
        <span>© 2026 Praktikum Pengembangan Aplikasi Website</span>
    </footer>

</body>
</html>
