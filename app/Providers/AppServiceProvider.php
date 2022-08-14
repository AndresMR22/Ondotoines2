<?php

namespace App\Providers;

use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $categorias = Categoria::all();
        $productos = Producto::paginate(10);
        $dataEmpresa = Empresa::all();
        $empresa = $dataEmpresa->first();
        $productoscount = Producto::select(DB::raw('count(*) as producto_count, categoria_id'))
        ->groupBy('categoria_id')->get();
        // dd($productoscount);
        $colores = collect();
        foreach($productos as $key => $producto)
        {
            foreach($producto->colores as $color)
            {
                $colores->push($color->codigo);
            }
        }
        
        view()->share([
            'categorias'=>$categorias,
            'productos'=>$productos,
            'empresa'=> $empresa,
            'colores'=>$colores,
            'productoscount'=>$productoscount
        ]);
    }
}
