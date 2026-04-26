@extends('layouts.app')
@section('title', 'Credit Cards')
@section('page-title', 'Credit Cards')

@section('content')
<div class="grid grid-cols-12 gap-6">
    {{-- Cards list --}}
    <div class="col-span-12 lg:col-span-8">
        <div class="card mb-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="section-title mb-0">My Cards</h2>
                <button class="btn-primary flex items-center gap-2">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Add New Card
                </button>
            </div>
            <div class="flex flex-col md:flex-row gap-5">
                @php
                $cards = [
                    ['$5,756', 'Alex Johnson', '12/26', '3778 •••• •••• 1234', 'linear-gradient(135deg, #2563EB 0%, #1E40AF 100%)'],
                    ['$3,490', 'Alex Johnson', '09/27', '4562 •••• •••• 5678', 'linear-gradient(135deg, #374151 0%, #111827 100%)'],
                    ['$2,100', 'Alex Johnson', '03/25', '7891 •••• •••• 9012', 'linear-gradient(135deg, #7C3AED 0%, #5B21B6 100%)'],
                ];
                @endphp
                @foreach($cards as $card)
                <div class="credit-card flex-1" style="background: {{ $card[4] }};">
                    <p class="text-xs font-600 text-white text-opacity-70 mb-2" style="font-weight:600;opacity:0.7;">BALANCE</p>
                    <p class="text-2xl font-800 mb-5" style="font-weight:800;">{{ $card[0] }}</p>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div><p class="text-xs opacity-70">CARD HOLDER</p><p class="text-sm font-600" style="font-weight:600;">{{ $card[1] }}</p></div>
                        <div><p class="text-xs opacity-70">VALID THRU</p><p class="text-sm font-600" style="font-weight:600;">{{ $card[2] }}</p></div>
                    </div>
                    <p class="text-xs tracking-widest font-500 relative z-10" style="font-weight:500;">{{ $card[3] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Card statistics --}}
        <div class="card">
            <h2 class="section-title">Card Spending Analytics</h2>
            <div id="cardSpendingChart" style="height:220px;"></div>
        </div>
    </div>

    {{-- Right panel --}}
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-5">
        <div class="card">
            <h2 class="section-title">Card Details</h2>
            <div class="flex flex-col gap-4">
                @php
                $details = [
                    ['Credit Limit','$10,000'],
                    ['Available Credit','$4,244'],
                    ['APR','18.99%'],
                    ['Annual Fee','$0'],
                    ['Next Payment Due','Feb 15, 2024'],
                    ['Minimum Payment','$35.00'],
                ];
                @endphp
                @foreach($details as $d)
                <div class="flex items-center justify-between py-2 border-b border-slate-50">
                    <span class="text-sm text-slate-500">{{ $d[0] }}</span>
                    <span class="text-sm font-700 text-slate-800" style="font-weight:700;">{{ $d[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card">
            <h2 class="section-title">Quick Actions</h2>
            <div class="flex flex-col gap-3">
                @php
                $actions = [
                    ['Block Card','bg-red-50 text-red-600','M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636'],
                    ['Request New Card','bg-blue-50 text-blue-600','M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6'],
                    ['Set Spending Limit','bg-green-50 text-green-600','M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'],
                ];
                @endphp
                @foreach($actions as $a)
                <button class="flex items-center gap-3 px-4 py-3 {{ $a[1] }} rounded-12 text-sm font-600 hover:opacity-80 transition-opacity" style="font-weight:600;border-radius:12px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="{{ $a[2] }}"/></svg>
                    {{ $a[0] }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
new ApexCharts(document.getElementById('cardSpendingChart'), {
    chart: { type: 'bar', height: 220, toolbar: { show: false }, fontFamily: 'Plus Jakarta Sans' },
    series: [{ name: 'Spending', data: [1200, 890, 450, 680, 1100, 760, 340, 920, 580, 1050, 430, 800] }],
    colors: ['#2563EB'],
    plotOptions: { bar: { borderRadius: 6, columnWidth: '50%' } },
    dataLabels: { enabled: false },
    xaxis: { categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'], labels: { style: { fontSize: '11px', colors: '#94A3B8' } }, axisBorder: { show: false }, axisTicks: { show: false } },
    yaxis: { labels: { style: { fontSize: '11px', colors: '#94A3B8' }, formatter: v => '$'+v } },
    grid: { borderColor: '#F1F5F9', strokeDashArray: 4 }
}).render();
</script>
@endpush
@endsection
