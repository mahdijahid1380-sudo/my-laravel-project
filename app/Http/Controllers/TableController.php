<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Resources\TableResource;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(Request $request)
    {
        // شروع کوئری روی مدل میزها
        $query = Table::query();

        // ۱. فیلتر بر اساس وضعیت میز (status: available, occopied, reserved)
        $query->when($request->query('status'), function ($q, $status) {
            $q->where('status', $status);
        });

        // ۲. فیلتر بر اساس ظرفیت میز (مثلاً میزهای ۴ نفره به بالا)
        $query->when($request->query('capacity'), function ($q, $capacity) {
            $q->where('capacity', '>=', (int) $capacity);
        });

        // ۳. سیستم جستجو (Search) بر اساس شماره یا نام میز (فیلد namber در دیتابیس شما)
        $query->when($request->query('search'), function ($q, $term) {
            $q->where('namber', 'like', "%{$term}%");
        });

        // ۴. سیستم مرتب‌سازی امن (Sorting Whitelist)
        $sortable = ['namber', 'capacity', 'created_at'];
        $sort = $request->query('sort', 'created_at');
        $direction = $request->query('direction', 'desc');

        if (!in_array($sort, $sortable)) $sort = 'created_at';
        if (!in_array($direction, ['asc', 'desc'])) $direction = 'desc';
        
        $query->orderBy($sort, $direction);

        // ۵. مدیریت تعداد در صفحه (Pagination)
        $perPage = (int) $request->query('per_page', 15);
        $perPage = min(100, max(1, $perPage));

        // بازگرداندن اطلاعات به همراه ساختار ریفرنس جدید
        return TableResource::collection($query->paginate($perPage));
    }
}
