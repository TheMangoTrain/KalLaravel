<?php

use Illuminate\Database\Seeder;
use Padam87\BinPacker\BinPacker;
use Padam87\BinPacker\Model\Bin;
use Padam87\BinPacker\Model\Block;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // To reset auto-increment (primary key) to 0
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing rows
        DB::table('orders')->truncate();
        DB::table('order_items')->truncate();
        DB::table('print_sheets')->truncate();
        DB::table('print_sheet_items')->truncate();

        // Make 50 orders
        factory(App\Order::class, 50)->create()->each(function ($Order) {

            // INIT VARIABLES
            $TotalPrice = 0; // TOTAL ORDER PRICE
            $PrintSheetItems = []; // PRINT SHEET ITEMS
            $Packer = new BinPacker(); // BIN-PACKER
            $Bin = new Bin(10, 15); // BIN-PACKER - BIN SIZE
            $Blocks = []; // BIN-PACKER - BLOCKS ARRAY

            // MAKE ORDER (Need to called manually here, since we're in the "->each" loop)
            factory(App\Order::class)->make();

            // MAKE ORDER ITEMS (random 1-10)
            $OrderItems = factory(App\OrderItem::class, rand(1, 10))->create(['order_id' => $Order->order_id]);

            // MAKE PRINT SHEET
            $PrintSheet = factory(App\PrintSheet::class)->create();

            // MAKE PRINT SHEET ITEMS (based on order items)
            foreach ($OrderItems as $OrderItem) {

                // GET PRODUCT SIZE
                // TODO: Perhaps use a "factory" way to convey product size, instead of manual Laravel DB call
                $sizeString = DB::table('products')->where('product_id', $OrderItem->product_id)->value('size');
                $sizeInt = array_map('intval', explode('x', $sizeString));
                //echo "width:" . $sizeInt[0];
                // echo "heiught:" . $sizeInt[1];

                // CREATE PRINT SHEET ITEM
                array_push($PrintSheetItems, factory(App\PrintSheetItem::class)->create([
                    'ps_id' => $PrintSheet->ps_id,
                    'order_item_id' => $OrderItem->order_item_id,
                    'size' => $sizeString,
                    'width' => $sizeInt[0],
                    'height' => $sizeInt[1],
                ]));

                // ADD PRINT SHEET ITEM TO bin blocks
                // Running a loop just to capture the generated psi_id
                // TODO: Maybe integrate this with the psi factory, to avoid this extra loop?
                foreach ($PrintSheetItems as $psi) {
                    if ($psi['order_item_id'] == $OrderItem->order_item_id) {
                        // Put width, height and PSI ID into a block
                        array_push($Blocks, new Block($psi['width'], $psi['height'], true, (string) $psi['psi_id']));
                    }
                }

                // ADD TO TOTAL PRICE
                $TotalPrice = $TotalPrice + App\Product::find($OrderItem->product_id)->price;
            }

            // UPDATE ORDER WITH TOTAL PRICE
            // TODO: EFFICIENCY: There should be a way to directly reference the newly created order, since we're still inside the factory loop.
            // For now, using manual DB command with order_id, which works, but is not the "factory" way.
            DB::table('orders')->where('order_id', $Order->order_id)->update(['total_price' => $TotalPrice]);

            // PACK THE BLOCKS
            $Blocks = $Packer->pack($Bin, $Blocks);
            print_r($Blocks);

            // UPDATE PRINT SHEET ITEMS WITH X,Y VALUES after bin packing
            foreach ($PrintSheetItems as $psi) {

                // LOOP THROUGH PACKED BLOCKS to get X,Y values
                foreach ($Blocks as $Block) {
                    if ($Block->getNode() && $Block->getId() === (string) $psi['psi_id']) {

                        // UPDATE PRINT SHEET ITEM with X and Y coords
                        DB::table('print_sheet_items')->where('psi_id', $psi['psi_id'])->update([
                            'x_pos' => $Block->getNode()->getX(),
                            'y_pos' => $Block->getNode()->getY(),
                        ]);
                    }
                }

            }

        });

        // ALLOWS AUTO-INCREMENT TO CONTINUE
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
