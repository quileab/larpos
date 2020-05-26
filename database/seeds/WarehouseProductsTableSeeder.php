<?php

use App\Warehouse;
use App\Product;
use App\Whprodquantity;
use Illuminate\Database\Seeder;

class WarehouseProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::truncate();
        $warehouse = new Warehouse();
        $warehouse->Name = 'United Warehouse';
        $warehouse->Description = '6013 S 194th St, Kent, WA 98032, Estados Unidos';
        $warehouse->save();

        $warehouse = new Warehouse();
        $warehouse->Name = 'Warehouse Direct';
        $warehouse->Description = '1601 W Algonquin Rd, Mt Prospect, IL 60056, Estados Unidos';
        $warehouse->save();

        $warehouse = new Warehouse();
        $warehouse->Name = 'Garvey Public Warehouse';
        $warehouse->Description = '5755 S Hoover Rd # 5, Wichita, KS 67215, Estados Unidos';
        $warehouse->save();

        $warehouse = new Warehouse();
        $warehouse->Name = 'Interstate Warehousing';
        $warehouse->Description = '1401 S Keystone Ave, Indianapolis, IN 46203, Estados Unidos';
        $warehouse->save();

        $warehouse = new Warehouse();
        $warehouse->Name = 'RPM Warehouse';
        $warehouse->Description = '1411 Tangier Dr, Middle River, MD 21220, Estados Unidos';
        $warehouse->save();

        $warehouse = new Warehouse();
        $warehouse->Name = 'USA Container Co., Inc.';
        $warehouse->Description = '1776 S 2nd St #1, Piscataway, NJ 08854, Estados Unidos';
        $warehouse->save();

        Product::truncate();
        $product = new Product();
        $product->barcode = '';
        $product->brand = 'LA VIRGINIA';
        $product->type = 'Café';
        $product->description = 'CAFE INST. FRASCO LA VIRGINIA  X 50 G';
        $product->unit_id = 1; // foreign
        $product->price = 36.50;
        $product->tax = 21;
        $product->profit1 = 0;
        $product->profit2 = 0;
        $product->salesprice1 = 41.25;
        $product->salesprice2 = 45.00;
        $product->discount = 5;
        $product->save();

        $product = new Product();
        $product->barcode = '';
        $product->brand = 'KNORR';
        $product->type = 'SOPA';
        $product->description = 'SOPA CREMA KNORR SUIZA DE POLLO';
        $product->unit_id = 1; // foreign
        $product->price = 9.50;
        $product->tax = 21;
        $product->profit1 = 0;
        $product->profit2 = 0;
        $product->salesprice1 = 9.50;
        $product->salesprice2 = 10.00;
        $product->discount = 3;
        $product->save();

        $product = new Product();
        $product->barcode = '';
        $product->brand = 'SANTA MARIA ';
        $product->type = 'DULCE DE LECHE ';
        $product->description = 'DULCE DE LECHE SANTA MARIA REP. X 1 KG';
        $product->unit_id = 3; // foreign
        $product->price = 60.12;
        $product->tax = 21;
        $product->profit1 = 0;
        $product->profit2 = 0;
        $product->salesprice1 = 60.25;
        $product->salesprice2 = 65.00;
        $product->discount = 3;
        $product->save();

        $product = new Product();
        $product->barcode = '';
        $product->brand = 'LEVITE';
        $product->type = 'AGUA SABORIZADA';
        $product->description = 'AGUA SABORIZADA LEVITE PERA (6X2.500C.C)';
        $product->unit_id = 5; // foreign
        $product->price = 174.50;
        $product->tax = 21;
        $product->profit1 = 0;
        $product->profit2 = 0;
        $product->salesprice1 = 180;
        $product->salesprice2 = 200;
        $product->discount = 5;
        $product->save();

        Whprodquantity::truncate();
        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 1;
        $product_quantity->product_id = 3;
        $product_quantity->quantity = 100;
        $product_quantity->qtymin = 10;
        $product_quantity->qtymax = 200;
        $product_quantity->save();

        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 1;
        $product_quantity->product_id = 2;
        $product_quantity->quantity = 59;
        $product_quantity->qtymin = 20;
        $product_quantity->qtymax = 180;
        $product_quantity->save();
        $product_quantity->warehouse_id = 1;
        $product_quantity->product_id = 1;

        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 1;
        $product_quantity->product_id = 3;
        $product_quantity->quantity = 60;
        $product_quantity->qtymin = 20;
        $product_quantity->qtymax = 250;
        $product_quantity->save();

        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 1;
        $product_quantity->product_id = 4;
        $product_quantity->quantity = 80;
        $product_quantity->qtymin = 50;
        $product_quantity->qtymax = 300;
        $product_quantity->save();

        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 2;
        $product_quantity->product_id = 1;
        $product_quantity->quantity = 60;
        $product_quantity->qtymin = 20;
        $product_quantity->qtymax = 250;
        $product_quantity->save();

        $product_quantity = new Whprodquantity();
        $product_quantity->warehouse_id = 3;
        $product_quantity->product_id = 2;
        $product_quantity->quantity = 80;
        $product_quantity->qtymin = 50;
        $product_quantity->qtymax = 300;
        $product_quantity->save();
    }
}
