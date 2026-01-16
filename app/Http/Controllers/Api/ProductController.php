<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()
            ->with('category:id,name')
            ->select('id', 'name', 'price', 'category_id', 'in_stock', 'rating', 'created_at');

        // Поиск по названию
        if ($q = $request->input('q')) {
            $query->where('name', 'like', "%{$q}%");
        }

        // Цена от-до
        if ($from = $request->input('price_from')) {
            $query->where('price', '>=', $from);
        }
        if ($to = $request->input('price_to')) {
            $query->where('price', '<=', $to);
        }

        // Категория
        if ($cat = $request->input('category_id')) {
            $query->where('category_id', $cat);
        }

        // Наличие
        if ($request->has('in_stock')) {
            $query->where('in_stock', filter_var($request->input('in_stock'), FILTER_VALIDATE_BOOLEAN));
        }

        // Рейтинг от
        if ($rating = $request->input('rating_from')) {
            $query->where('rating', '>=', $rating);
        }
// Сортировка
        $sort = strtolower($request->input('sort', 'newest'));

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price');
                break;

            case 'price_desc':
                $query->orderByDesc('price');
                break;

            case 'rating_desc':
                $query->orderByDesc('rating');
                break;

            default: // newest
                $query->latest('created_at');
                break;
        }

        // Пагинация
        $perPage = $request->input('per_page', 12);
        $products = $query->paginate($perPage);

        return response()->json([
            'data' => $products->items(),
            'meta' => [
                'current_page' => $products->currentPage(),
                'last_page'    => $products->lastPage(),
                'per_page'     => $products->perPage(),
                'total'        => $products->total(),
                'from'         => $products->firstItem(),
                'to'           => $products->lastItem(),
            ]
        ]);
    }
}