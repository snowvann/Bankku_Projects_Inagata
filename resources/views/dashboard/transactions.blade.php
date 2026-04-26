@extends('layouts.app')
@section('title', 'Transactions')
@section('page-title', 'Transactions')

@section('content')
<div class="card">
    {{-- Filters --}}
    <div class="flex flex-wrap items-center gap-3 mb-6">
        <div class="w-full md:flex-1 search-bar">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <input type="text" placeholder="Search transactions...">
        </div>
        <select class="form-input w-full md:w-40">
            <option>All Types</option>
            <option>Income</option>
            <option>Expense</option>
            <option>Transfer</option>
        </select>
        <select class="form-input w-full md:w-40">
            <option>This Month</option>
            <option>Last Month</option>
            <option>Last 3 Months</option>
            <option>This Year</option>
        </select>
        <button class="btn-primary flex items-center gap-2">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
            Filter
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="loan-table w-full">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="text-left">Transaction</th>
                    <th class="text-left">Category</th>
                    <th class="text-left">Date</th>
                    <th class="text-left">Amount</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>
            <tbody>
            @php
            $transactions = [
                ['Deposit from my Card','Shopping','28 Jan 2024','+$850.00','Completed','bg-yellow-100','#F59E0B'],
                ['Deposit Paypal','Income','25 Jan 2024','+$2,500.00','Completed','bg-blue-100','#2563EB'],
                ['Jemi Wilson','Transfer','21 Jan 2024','-$5,400.00','Pending','bg-purple-100','#7C3AED'],
                ['Transfer to Chase','Transfer','18 Jan 2024','-$1,200.00','Completed','bg-red-100','#EF4444'],
                ['Netflix Subscription','Entertainment','15 Jan 2024','-$15.99','Completed','bg-pink-100','#EC4899'],
                ['Grocery Store','Food','12 Jan 2024','-$89.50','Completed','bg-green-100','#10B981'],
                ['Salary Deposit','Income','01 Jan 2024','+$5,000.00','Completed','bg-emerald-100','#059669'],
                ['Amazon Purchase','Shopping','30 Dec 2023','-$234.00','Completed','bg-orange-100','#F97316'],
            ];
            $statusColors = ['Completed'=>'bg-green-100 text-green-700','Pending'=>'bg-yellow-100 text-yellow-700','Failed'=>'bg-red-100 text-red-600'];
            @endphp
            @foreach($transactions as $t)
            <tr>
                <td>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 {{ $t[5] }} rounded-full flex items-center justify-center flex-shrink-0">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="{{ $t[6] }}" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <span class="font-600 text-slate-800" style="font-weight:600;">{{ $t[0] }}</span>
                    </div>
                </td>
                <td><span class="chip-status bg-slate-100 text-slate-600">{{ $t[1] }}</span></td>
                <td class="text-slate-500">{{ $t[2] }}</td>
                <td class="font-700 {{ str_starts_with($t[3],'+') ? 'text-emerald-500' : 'text-red-500' }}" style="font-weight:700;">{{ $t[3] }}</td>
                <td><span class="chip-status {{ $statusColors[$t[4]] }}">{{ $t[4] }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    {{-- Pagination --}}
    <div class="flex items-center justify-between pt-5 mt-4 border-t border-slate-100">
        <p class="text-sm text-slate-400">Showing 1-8 of 48 transactions</p>
        <div class="flex items-center gap-2">
            <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-sm hover:bg-slate-200 transition-colors">‹</button>
            <button class="w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-700" style="font-weight:700;">1</button>
            <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-sm hover:bg-slate-200 transition-colors">2</button>
            <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-sm hover:bg-slate-200 transition-colors">3</button>
            <button class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 text-sm hover:bg-slate-200 transition-colors">›</button>
        </div>
    </div>
</div>
@endsection
