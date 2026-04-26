@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Overview')

@section('content')
<div class="grid grid-cols-12 gap-6">

    {{-- LEFT COLUMN --}}
    <div class="col-span-12 lg:col-span-8 flex flex-col gap-6">

        {{-- MY CARDS --}}
        <div class="card">
            <div class="flex items-center justify-between mb-5">
                <h2 class="section-title mb-0">My Cards</h2>
                <a href="{{ route('credit-cards') }}" class="text-sm font-600 text-blue-600 hover:text-blue-700" style="font-weight:600;">See All</a>
            </div>
            <div class="flex gap-4 overflow-x-auto pb-1">
                {{-- Card 1 --}}
                <div class="credit-card flex-shrink-0 w-56" style="background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);">
                    <p class="text-xs font-600 text-blue-200 mb-3" style="font-weight:600;">BALANCE</p>
                    <p class="text-2xl font-800 mb-5" style="font-weight:800;">$5,756</p>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div>
                            <p class="text-xs text-blue-200">CARD HOLDER</p>
                            <p class="text-sm font-600" style="font-weight:600;">Alex Johnson</p>
                        </div>
                        <div>
                            <p class="text-xs text-blue-200">VALID THRU</p>
                            <p class="text-sm font-600" style="font-weight:600;">12/26</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between relative z-10">
                        <p class="text-sm tracking-widest font-500" style="font-weight:500;">3778 •••• •••• 1234</p>
                        <div class="flex">
                            <div class="w-7 h-7 rounded-full bg-white opacity-60 -mr-2"></div>
                            <div class="w-7 h-7 rounded-full bg-white opacity-40"></div>
                        </div>
                    </div>
                </div>
                {{-- Card 2 --}}
                <div class="credit-card flex-shrink-0 w-56" style="background: linear-gradient(135deg, #374151 0%, #111827 100%);">
                    <p class="text-xs font-600 text-gray-400 mb-3" style="font-weight:600;">BALANCE</p>
                    <p class="text-2xl font-800 mb-5" style="font-weight:800;">$3,490</p>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div>
                            <p class="text-xs text-gray-400">CARD HOLDER</p>
                            <p class="text-sm font-600" style="font-weight:600;">Alex Johnson</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">VALID THRU</p>
                            <p class="text-sm font-600" style="font-weight:600;">09/27</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between relative z-10">
                        <p class="text-sm tracking-widest font-500" style="font-weight:500;">4562 •••• •••• 5678</p>
                        <div class="flex">
                            <div class="w-7 h-7 rounded-full bg-yellow-400 opacity-80 -mr-2"></div>
                            <div class="w-7 h-7 rounded-full bg-yellow-200 opacity-60"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CHARTS ROW --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Weekly Activity --}}
            <div class="card">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="section-title mb-0">Weekly Activity</h2>
                    <div class="flex items-center gap-4 text-xs text-slate-500">
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-blue-600 inline-block"></span>Deposit</span>
                        <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded-sm bg-slate-200 inline-block"></span>Withdraw</span>
                    </div>
                </div>
                <div id="weeklyChart" style="height:180px;"></div>
            </div>

            {{-- Expense Statistics --}}
            <div class="card">
                <h2 class="section-title">Expense Statistics</h2>
                <div id="expenseChart" style="height:180px;"></div>
            </div>
        </div>

        {{-- QUICK TRANSFER + BALANCE HISTORY --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
            {{-- Quick Transfer --}}
            <div class="card col-span-1 lg:col-span-2">
                <h2 class="section-title">Quick Transfer</h2>
                <div class="flex gap-3 overflow-x-auto pb-2 mb-5">
                    @php
                    $contacts = [
                        ['name'=>'Livia Bates','role'=>'Director','img'=>'https://i.pravatar.cc/52?img=5'],
                        ['name'=>'Randy Press','role'=>'Designer','img'=>'https://i.pravatar.cc/52?img=12'],
                        ['name'=>'Workman','role'=>'Developer','img'=>'https://i.pravatar.cc/52?img=18'],
                        ['name'=>'Sara M.','role'=>'Manager','img'=>'https://i.pravatar.cc/52?img=25'],
                    ];
                    @endphp
                    @foreach($contacts as $contact)
                    <div class="flex flex-col items-center gap-1.5 flex-shrink-0 cursor-pointer group">
                        <img src="{{ $contact['img'] }}" class="quick-transfer-avatar group-hover:border-blue-400 transition-colors" alt="{{ $contact['name'] }}">
                        <p class="text-xs font-600 text-slate-700 text-center whitespace-nowrap" style="font-weight:600;">{{ $contact['name'] }}</p>
                        <p class="text-xs text-slate-400 text-center">{{ $contact['role'] }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="flex items-center gap-3">
                    <label class="text-sm text-slate-500 font-500 whitespace-nowrap" style="font-weight:500;">Write Amount</label>
                    <div class="flex-1 bg-slate-100 rounded-full flex items-center overflow-hidden">
                        <input type="text" value="$525.50" class="flex-1 bg-transparent px-4 py-2.5 text-sm font-600 text-slate-700 outline-none" style="font-weight:600;">
                    </div>
                    <button class="btn-primary flex items-center gap-2 whitespace-nowrap">
                        Send
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </div>
            </div>

            {{-- Balance History --}}
            <div class="card col-span-1 lg:col-span-3">
                <h2 class="section-title">Balance History</h2>
                <div id="balanceChart" style="height:160px;"></div>
            </div>
        </div>

    </div>

    {{-- RIGHT COLUMN --}}
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-6">

        {{-- Recent Transactions --}}
        <div class="card">
            <div class="flex items-center justify-between mb-5">
                <h2 class="section-title mb-0">Recent Transaction</h2>
                <a href="{{ route('transactions') }}" class="text-sm font-600 text-blue-600 hover:text-blue-700" style="font-weight:600;">See All</a>
            </div>
            <div class="flex flex-col gap-4">
                @php
                $txns = [
                    ['icon'=>'card','title'=>'Deposit from my Card','date'=>'28 January 2024','amount'=>'+$850','positive'=>true,'color'=>'bg-yellow-100','ic'=>'#F59E0B'],
                    ['icon'=>'paypal','title'=>'Deposit Paypal','date'=>'25 January 2024','amount'=>'+$2,500','positive'=>true,'color'=>'bg-blue-100','ic'=>'#2563EB'],
                    ['icon'=>'user','title'=>'Jemi Wilson','date'=>'21 January 2024','amount'=>'-$5,400','positive'=>false,'color'=>'bg-red-100','ic'=>'#EF4444'],
                    ['icon'=>'dollar','title'=>'Transfer to Chase','date'=>'18 January 2024','amount'=>'-$1,200','positive'=>false,'color'=>'bg-purple-100','ic'=>'#7C3AED'],
                ];
                @endphp
                @foreach($txns as $txn)
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 {{ $txn['color'] }} rounded-full flex items-center justify-center flex-shrink-0">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="{{ $txn['ic'] }}" stroke-width="2">
                            @if($txn['icon'] === 'card')
                            <rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>
                            @elseif($txn['icon'] === 'paypal')
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            @elseif($txn['icon'] === 'user')
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                            @else
                            <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            @endif
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-600 text-slate-800 truncate" style="font-weight:600;">{{ $txn['title'] }}</p>
                        <p class="text-xs text-slate-400">{{ $txn['date'] }}</p>
                    </div>
                    <p class="text-sm font-700 {{ $txn['positive'] ? 'text-emerald-500' : 'text-red-500' }} flex-shrink-0" style="font-weight:700;">{{ $txn['amount'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Metric Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="metric-card">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <span class="text-xs text-slate-500 font-500" style="font-weight:500;">Total Balance</span>
                </div>
                <p class="text-xl font-800 text-slate-800" style="font-weight:800;">$9,246</p>
                <p class="text-xs text-emerald-500 font-600 mt-1" style="font-weight:600;">↑ 2.4% this month</p>
            </div>
            <div class="metric-card">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <span class="text-xs text-slate-500 font-500" style="font-weight:500;">Income</span>
                </div>
                <p class="text-xl font-800 text-slate-800" style="font-weight:800;">$3,340</p>
                <p class="text-xs text-emerald-500 font-600 mt-1" style="font-weight:600;">↑ 8.1% this month</p>
            </div>
            <div class="metric-card">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#EF4444" stroke-width="2"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"/><polyline points="17 18 23 18 23 12"/></svg>
                    </div>
                    <span class="text-xs text-slate-500 font-500" style="font-weight:500;">Expense</span>
                </div>
                <p class="text-xl font-800 text-slate-800" style="font-weight:800;">$1,860</p>
                <p class="text-xs text-red-400 font-600 mt-1" style="font-weight:600;">↓ 3.2% this month</p>
            </div>
            <div class="metric-card">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <span class="text-xs text-slate-500 font-500" style="font-weight:500;">Savings</span>
                </div>
                <p class="text-xl font-800 text-slate-800" style="font-weight:800;">$5,200</p>
                <p class="text-xs text-emerald-500 font-600 mt-1" style="font-weight:600;">↑ 5.7% this month</p>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
// Weekly Activity Bar Chart
const weeklyOpts = {
    chart: { type: 'bar', height: 180, toolbar: { show: false }, fontFamily: 'Plus Jakarta Sans', background: 'transparent' },
    series: [
        { name: 'Deposit', data: [480, 320, 550, 410, 500, 380, 460] },
        { name: 'Withdraw', data: [220, 180, 300, 160, 280, 200, 240] }
    ],
    colors: ['#2563EB', '#E2E8F0'],
    plotOptions: { bar: { borderRadius: 6, columnWidth: '55%', grouped: true } },
    dataLabels: { enabled: false },
    xaxis: { categories: ['Sat','Sun','Mon','Tue','Wed','Thu','Fri'], axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: { fontSize: '11px', colors: '#94A3B8' } } },
    yaxis: { labels: { style: { fontSize: '11px', colors: '#94A3B8' }, formatter: v => '$'+v } },
    grid: { borderColor: '#F1F5F9', strokeDashArray: 4 },
    legend: { show: false }
};
new ApexCharts(document.getElementById('weeklyChart'), weeklyOpts).render();

// Expense Donut Chart
const expenseOpts = {
    chart: { type: 'donut', height: 180, fontFamily: 'Plus Jakarta Sans', background: 'transparent' },
    series: [35, 20, 25, 20],
    labels: ['Entertainment', 'Bill Expense', 'Investment', 'Others'],
    colors: ['#312E81','#F97316','#2563EB','#1E293B'],
    legend: { position: 'bottom', fontSize: '11px', fontFamily: 'Plus Jakarta Sans', offsetY: 4 },
    plotOptions: { pie: { donut: { size: '65%', labels: { show: true, total: { show: true, label: 'Total', fontSize: '11px', color: '#64748B', formatter: () => '$5,756' } } } } },
    dataLabels: { enabled: false },
    stroke: { width: 0 }
};
new ApexCharts(document.getElementById('expenseChart'), expenseOpts).render();

// Balance History Line Chart
const balanceOpts = {
    chart: { type: 'area', height: 160, toolbar: { show: false }, fontFamily: 'Plus Jakarta Sans', background: 'transparent' },
    series: [{ name: 'Balance', data: [5500, 6200, 4800, 7100, 5800, 8200, 7400, 9100, 7800, 8500, 9246] }],
    colors: ['#2563EB'],
    fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.01 } },
    stroke: { curve: 'smooth', width: 2.5 },
    xaxis: { categories: ['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May'], axisBorder: { show: false }, axisTicks: { show: false }, labels: { style: { fontSize: '11px', colors: '#94A3B8' } } },
    yaxis: { labels: { style: { fontSize: '11px', colors: '#94A3B8' }, formatter: v => '$'+v } },
    grid: { borderColor: '#F1F5F9', strokeDashArray: 4 },
    dataLabels: { enabled: false },
    tooltip: { theme: 'light' }
};
new ApexCharts(document.getElementById('balanceChart'), balanceOpts).render();
</script>
@endpush
