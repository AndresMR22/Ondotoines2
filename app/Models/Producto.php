<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Producto extends Model
{
    use HasFactory, SoftDeletes, Rateable;
    public $fillable = [
        "codigo",
        "cantidad",
        "nombre",
        "marca",
        "modelo",
        "descripcion",
        // "color",
        "categoria_id",
        "subcategoria_id",
        "deleted_at"
    ];

    public function images()
    {
        return $this->morphMany(Imagen::class, 'tipo');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class)->withTrashed();
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function colores()
    {
        return $this->hasMany(Color::class);
    }

    public function productoprecio()
    {
        return $this->hasOne(ProductoPrecio::class);
    }

    public function haveDiscount($producto_id)
    {

        $producto = Producto::find($producto_id);
      if(isset($producto->productoprecio))
      {
        $fecha_inicio = $producto->productoprecio->inicio_descuento;
        $fecha_fin = $producto->productoprecio->fin_descuento;
        if($fecha_fin>Carbon::now() && isset($producto->productoprecio))
            return true;
        
        return false;
      }
        
        return false;
    }

    public function priceDiscount($producto_id)
    {
        $producto = Producto::find($producto_id);
        $descuento = $producto->productoprecio->descuento;
        $pvp = $producto->productoprecio->pvp;
        $newPrice = $pvp-($pvp*($descuento/100));
        // dd($newPrice);
        return $newPrice;
    }


    public  function colorsByModelProduct($producto)
    {
        $colores = DB::table('productos')
        ->select('color')
        ->where('modelo',$producto->modelo)
        ->where('categoria_id',$producto->categoria_id)
        ->where('subcategoria_id',$producto->subcategoria_id)
        ->where('marca',$producto->marca)
        ->get();
        return $colores;
    }
    public function stockByProduct($producto)
    {
        $productos = DB::table('productos')
        ->where('modelo',$producto->modelo)
        ->where('categoria_id',$producto->categoria_id)
        ->where('subcategoria_id',$producto->subcategoria_id)
        ->where('marca',$producto->marca)
        ->get();
        $stock = count($productos);
        return $stock;
    }

    public static function similar($producto){
        
        $producto =  Producto::where([['categoria_id','=',$producto->categoria_id],['id','!=',$producto->id]])->get();
        
        return $producto;
    }
}
