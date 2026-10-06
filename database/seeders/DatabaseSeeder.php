<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        User::create([
            'name' => 'Sale User',
            'email' => 'sale@example.com',
            'password' => bcrypt('password'),
            'role' => 'sale',
        ]);

        User::create([
            'name' => 'Warehouse Manager',
            'email' => 'warehouse@example.com',
            'password' => bcrypt('password'),
            'role' => 'warehouse_manager',
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Products
        $product1 = Product::create([
            'name' => 'Product A',
        ]);

        $product2 = Product::create([
            'name' => 'Product B',
        ]);

        // 3. Product Variants
        $variant1 = ProductVariant::create([
            'product_id' => $product1->id,
            'sku' => 'SKU-A001',
        ]);

        $variant2 = ProductVariant::create([
            'product_id' => $product2->id,
            'sku' => 'SKU-B001',
        ]);

        // 4. Order
        $order = Order::create([
            'code' => 'ORD-000001',
            'channel' => 'shopee',
            'status' => 'pending',
        ]);

        // 5. Order Item
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product1->id,
            'product_variant_id' => $variant1->id,
            'sku' => $variant1->sku,
            'quantity' => 2,
        ]);
    }
}
