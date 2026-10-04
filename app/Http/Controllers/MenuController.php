<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // شروع کوئری به همراه ریلیشن
        $query = Menu::query()->with('menuItems');

        // ۱. فیلتر بر اساس دسته‌بندی (Category)
        $query->when($request->query('category'), function ($q, $category) {
            $q->where('category', $category);
        });

        // ۲. فیلتر بر اساس موجود بودن (is_available=true)
        $query->when($request->has('active'), function ($q) use ($request) {
            $q->where('is_available', $request->boolean('active'));
        });

        // ۳. سیستم جستجو (Search) بر اساس نام منو
        $query->when($request->query('search'), function ($q, $term) {
            $q->where('name', 'like', "%{$term}%");
        });

        // ۴. سیستم مرتب‌سازی امن (Sorting Whitelist)
        $sortable = ['name', 'price', 'created_at'];
        $sort = $request->query('sort', 'created_at');
        $direction = $request->query('direction', 'desc');

        if (!in_array($sort, $sortable)) $sort = 'created_at';
        if (!in_array($direction, ['asc', 'desc'])) $direction = 'desc';
        
        $query->orderBy($sort, $direction);

        // ۵. مدیریت تعداد در صفحه (Pagination Cap)
        $perPage = (int) $request->query('per_page', 15);
        $perPage = min(100, max(1, $perPage)); // حداکثر ۱۰۰ آیتم در هر صفحه برای امنیت سرور

        // بازگرداندن اطلاعات قالب‌بندی شده با ریسورس
        return MenuResource::collection($query->paginate($perPage));
    }
    
    // بقیه متدهای store, show, update, destroy را تغییر ندهید، فقط خروجی آن‌ها را با return new MenuResource($menu); بازگردانید.
}
