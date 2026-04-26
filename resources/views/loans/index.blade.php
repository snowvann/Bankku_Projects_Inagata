@extends('layouts.app')
@section('title', 'Loans')
@section('page-title', 'Loans')

@section('content')
{{-- Summary Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
    @php
    $summaries = [
        ['label'=>'Personal Loan','value'=>'$40,000','icon'=>'user','color'=>'bg-blue-100','ic'=>'#2563EB'],
        ['label'=>'Corporate Loan','value'=>'$100,000','icon'=>'building','color'=>'bg-indigo-100','ic'=>'#4F46E5'],
        ['label'=>'Business Loan','value'=>'$500,000','icon'=>'chart','color'=>'bg-pink-100','ic'=>'#EC4899'],
        ['label'=>'Custom Loan','value'=>'Choose Money','icon'=>'plus','color'=>'bg-red-100','ic'=>'#EF4444'],
    ];
    @endphp
    @foreach($summaries as $s)
    <div class="card flex items-center gap-4 py-5">
        <div class="w-12 h-12 {{ $s['color'] }} rounded-full flex items-center justify-center flex-shrink-0">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="{{ $s['ic'] }}" stroke-width="2">
                @if($s['icon']==='user')
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                @elseif($s['icon']==='building')
                <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 3v18M3 9h18M3 15h18"/>
                @elseif($s['icon']==='chart')
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>
                @else
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                @endif
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 font-500 mb-0.5" style="font-weight:500;">{{ $s['label'] }}</p>
            <p class="text-lg font-800 text-slate-800" style="font-weight:800;">{{ $s['value'] }}</p>
        </div>
    </div>
    @endforeach
</div>

{{-- Active Loans Overview --}}
<div class="card">
    <h2 class="section-title mb-5">Active Loans Overview</h2>
    <div class="overflow-x-auto">
        <table class="loan-table w-full">
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="text-left">SL NO</th>
                    <th class="text-left">Loan Money</th>
                    <th class="text-left">Left to Repay</th>
                    <th class="text-left">Duration</th>
                    <th class="text-left">Interest Rate</th>
                    <th class="text-left">Installment</th>
                    <th class="text-left">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $loans = [
                    [1,'$100,000','$40,500','8 Months','12%','$2,000 / month','Completed'],
                    [2,'$500,000','$250,000','36 Months','10%','$8,000 / month','Active'],
                    [3,'$900,000','$40,500','12 Months','14%','$2,000 / month','Active'],
                    [4,'$50,000','$40,500','25 Months','5%','$2,000 / month','Active'],
                    [5,'$50,000','$40,500','5 Months','16%','$10,000 / month','Rejected'],
                    [6,'$80,000','$25,000','8 Months','6%','$2,000 / month','Completed'],
                    [7,'$12,000','$5,000','9 Months','4%','$500 / month','Active'],
                ];
                $statusColors = ['Completed'=>'bg-green-100 text-green-700','Active'=>'bg-blue-100 text-blue-700','Rejected'=>'bg-red-100 text-red-600'];
                @endphp
                @foreach($loans as $loan)
                <tr>
                    <td class="font-600 text-slate-500" style="font-weight:600;">{{ sprintf('%02d', $loan[0]) }}</td>
                    <td class="font-700 text-slate-800" style="font-weight:700;">{{ $loan[1] }}</td>
                    <td class="text-slate-600">{{ $loan[2] }}</td>
                    <td class="text-slate-600">{{ $loan[3] }}</td>
                    <td class="text-slate-600">{{ $loan[4] }}</td>
                    <td class="font-600 text-slate-700" style="font-weight:600;">{{ $loan[5] }}</td>
                    <td>
                        <span class="chip-status {{ $statusColors[$loan[6]] }}">{{ $loan[6] }}</span>
                    </td>
                    <td>
                        <button class="btn-primary text-xs py-2 px-4">None</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t-2 border-slate-200">
                    <td class="pt-4 font-700 text-slate-500" style="font-weight:700;">Total</td>
                    <td class="pt-4 font-800 text-blue-600" style="font-weight:800;">$1,692,000</td>
                    <td class="pt-4 font-800 text-blue-400" style="font-weight:800;">$441,500</td>
                    <td colspan="5" class="pt-4 text-slate-400 text-xs">$83,400 / month</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
