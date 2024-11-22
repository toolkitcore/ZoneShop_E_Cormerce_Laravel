<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin; // Nhập khẩu model Admin
use App\Models\Transaction;

class AdminControllers extends Controller
{
    // public function AuthLogin()
    // {
    //     $admin_id = Session::get('admin_id');
    //     if ($admin_id) {
    //         return Redirect::to('dashboard');
    //     } else {
    //         return redirect('admin')->send();
    //     }
    // }
    // public function index()
    // {
    //     return view('admin_login');
    // }
    public function index()
    {
        //  
        $revenueData = DB::table(
            DB::raw(
                '(SELECT 1 AS month UNION ALL
            SELECT 2 UNION ALL
            SELECT 3 UNION ALL
            SELECT 4 UNION ALL
            SELECT 5 UNION ALL
            SELECT 6 UNION ALL
            SELECT 7 UNION ALL
            SELECT 8 UNION ALL
            SELECT 9 UNION ALL
            SELECT 10 UNION ALL
            SELECT 11 UNION ALL
            SELECT 12) AS months'
            )
        )
            ->leftJoin('tbl_transactions as t', function ($join) {
                $join->on(DB::raw('MONTH(t.created_at)'), '=', DB::raw('months.month'))
                    ->whereYear('t.created_at', '=', DB::raw('YEAR(CURRENT_DATE())'))
                    ->where('t.transaction_status', '=', 5);
            })
            ->select(
                'months.month',
                DB::raw('COALESCE(SUM(t.transaction_amount), 0) AS total_revenue'),
                DB::raw('COALESCE(COUNT(t.transaction_id), 0) AS transaction_count')
            )
            ->groupBy('months.month')
            ->orderBy('months.month')
            ->get();
        $currentWeekOrders = DB::table('tbl_orders')
            ->whereRaw('YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)')
            ->sum('order_qty');

        $previousWeekOrders = DB::table('tbl_orders')
            ->whereRaw('YEARWEEK(created_at, 1) = YEARWEEK(CURDATE() - INTERVAL 1 WEEK, 1)')
            ->sum('order_qty');

        $percentageChange = $previousWeekOrders == 0
            ? null
            : round((($currentWeekOrders - $previousWeekOrders) * 100.0) / $previousWeekOrders, 2);
        $currentMonthTransactions = DB::table('tbl_transactions')
            ->where('transaction_status', 5)
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE())')
            ->count();

        $previousMonthTransactions = DB::table('tbl_transactions')
            ->where('transaction_status', 5)
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)')
            ->count();

        $percentageChange_transaction = $previousMonthTransactions == 0
            ? null
            : round((($currentMonthTransactions - $previousMonthTransactions) * 100.0) / $previousMonthTransactions, 2);


        $currentMonthRevenue = DB::table('tbl_transactions')
            ->where('transaction_status', 5)
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE())')
            ->sum('transaction_amount');

        $previousMonthRevenue = DB::table('tbl_transactions')
            ->where('transaction_status', 5)
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)')
            ->sum('transaction_amount');

        $percentageChange_revenue = $previousMonthRevenue == 0
            ? null
            : round((($currentMonthRevenue - $previousMonthRevenue) * 100.0) / $previousMonthRevenue, 2);

        $currentMonthUsers = DB::table('users')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE())')
            ->count();

        $previousMonthUsers = DB::table('users')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)')
            ->count();

        $percentageChange_Users = $previousMonthUsers == 0
            ? null
            : round((($currentMonthUsers - $previousMonthUsers) * 100.0) / $previousMonthUsers, 2);

        $currentMonthComments = DB::table('tbl_comments')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE())')
            ->count();

        $previousMonthComments = DB::table('tbl_comments')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)')
            ->count();

        $percentageChange_comments = $previousMonthComments == 0
            ? null
            : round((($currentMonthComments - $previousMonthComments) * 100.0) / $previousMonthComments, 2);

        $currentMonthCancelledOrders = DB::table('tbl_transactions')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE())')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE())')
            ->where('transaction_status', 6)
            ->count();

        $previousMonthCancelledOrders = DB::table('tbl_transactions')
            ->whereRaw('MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH)')
            ->whereRaw('YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)')
            ->where('transaction_status', 6)
            ->count();

        $percentageChange_Cancel_Order = $previousMonthCancelledOrders == 0
            ? null
            : round((($currentMonthCancelledOrders - $previousMonthCancelledOrders) * 100.0) / $previousMonthCancelledOrders, 2);
        $transaction_item = Transaction::with([
            'orders',
            'orders.product',
            'deliveryAddress'
        ])->orderBy('transaction_id', 'desc')->take(5)->get();
        $transaction_count = Transaction::count();
        $categories = DB::table('tbl_category_product as c')
            ->select(
                'c.category_name',
                DB::raw('ROUND((SUM(o.order_qty) / total_qty.total_qty) * 100, 2) as percentage')
            )
            ->leftJoin('tbl_product as p', 'c.category_id', '=', 'p.category_id')
            ->leftJoin('tbl_orders as o', 'p.product_id', '=', 'o.product_id')
            ->join(DB::raw('(SELECT SUM(order_qty) AS total_qty FROM tbl_orders) as total_qty'), function ($join) {
                $join->on(DB::raw('1'), '=', DB::raw('1'));
            })
            ->groupBy('c.category_name', 'total_qty.total_qty')
            ->havingRaw('percentage IS NOT NULL AND percentage > 0')
            ->orderByDesc('percentage')
            ->get();
        $transactionStatuses = DB::table(DB::raw('(SELECT 0 AS transaction_status 
                                                    UNION 
                                                    SELECT 1
                                                    UNION 
                                                    SELECT 2 
                                                    UNION 
                                                    SELECT 3 
                                                    UNION 
                                                    SELECT 4 
                                                    UNION 
                                                    SELECT 5 
                                                    UNION 
                                                    SELECT 6
                                                    ) AS status_range'))
            ->leftJoin('tbl_transactions as t', function ($join) {
                $join->on('t.transaction_status', '=', 'status_range.transaction_status')
                    ->whereYear('t.created_at', '=', date('Y'));
            })
            ->select('status_range.transaction_status', DB::raw('COALESCE(COUNT(t.transaction_id), 0) AS total_transactions'))
            ->groupBy('status_range.transaction_status')
            ->orderBy('status_range.transaction_status')
            ->get();
        return view(
            'admin.dashboard',
            compact(
                'revenueData',
                'currentWeekOrders',
                'percentageChange',
                'currentMonthTransactions',
                'percentageChange_transaction',
                'currentMonthRevenue',
                'percentageChange_revenue',
                'currentMonthUsers',
                'percentageChange_Users',
                'currentMonthComments',
                'percentageChange_comments',
                'currentMonthCancelledOrders',
                'percentageChange_Cancel_Order',
                'transaction_item',
                'transaction_count',
                'categories',
                'transactionStatuses',
            )
        );
    }
    //login -> dashboard    
    public function Dashboard(Request $request)
    {
        //  
        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);

        // $result = Admin::where('admin_email', $admin_email)
        //     ->where('admin_password', $admin_password)
        //     ->first();

        // if ($result) {
        //     Session::put('admin_name', $result->admin_name);
        //     Session::put('admin_id', $result->admin_id);
        //     Session::flash('success', 'Login Successfully !');
        //     return redirect('/dashboard');
        // } else {
        //     Session::flash('error', 'Password or Username invalid! Please enter again !');
        //     return redirect('/admin');
        // }
    }
    public function Logout()
    {
        //  
        // Session::put('admin_name', null);
        // Session::put('admin_id', null);
        // Session::flash('success', 'Logout Successfully !');
        // return redirect('/admin');
    }
    public function Show_profile()
    {
        //  
        return view('admin.profile_admin');
    }
}
