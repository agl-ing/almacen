<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Warehouse;
use App\Models\Warehouse_Product;

class DashboardController extends Controller
{
    public function index(){

        /**$warehouses = Warehouse_Product::selectRaw('count(warehouse_product.qty) as quantity, products.name')
                        ->join('products', 'products.id', '=', 'warehouse_product.warehouse_id')
                        ->groupBy('warehouse_product.warehouse_id')
                        ->get();**/
        $warehouses = Warehouse_Product::join('products', 'warehouse_product.product_id', '=', 'products.id')
                                        ->join('warehouses', 'warehouse_product.warehouse_id', '=', 'warehouses.id')
                                        //->groupBy('warehouse_product.warehouse_id', 'products.name')
                                        ->select('products.name', 'warehouse_product.warehouse_id', 'warehouses.name as wh', 'warehouse_product.qty', 'warehouse_product.created_at', /**DB::raw('SUM(warehouse_product.qty) as quantity')**/)
                                        ->get();
        
        return view(
            "admin.dashboard",
            [
                'warehouses' => $warehouses
            ]
        );
    }

    public function almacenG(){

        $warehouses = Warehouse::get();

        return view(
            "admin.almacen",
            [
                'warehouses' => $warehouses
            ]
        );
    }
}
