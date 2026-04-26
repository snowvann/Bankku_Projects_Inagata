@extends('layouts.app')
@section('title', 'Settings')
@section('page-title', 'Setting')

@section('content')
<div class="card">
    {{-- Tabs --}}
    <div class="flex flex-wrap items-center gap-2 border-b border-slate-100 pb-5 mb-6">
        <button class="tab-btn active" onclick="switchTab('profile', this)">Edit Profile</button>
        <button class="tab-btn" onclick="switchTab('preferences', this)">Preferences</button>
        <button class="tab-btn" onclick="switchTab('security', this)">Security</button>
    </div>

    {{-- EDIT PROFILE TAB --}}
    <div id="tab-profile" class="tab-content">
        <div class="flex flex-col md:flex-row gap-8">
            {{-- Avatar --}}
            <div class="flex-shrink-0">
                <div class="relative w-24">
                    <img src="https://i.pravatar.cc/96?img=47" class="w-24 h-24 rounded-full border-4 border-blue-100" alt="Profile">
                    <button class="absolute bottom-0 right-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    </button>
                </div>
            </div>

            {{-- Form --}}
            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="form-label">Your Name</label>
                    <input type="text" class="form-input" value="Alex Johnson">
                </div>
                <div>
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-input" value="alexj_bankku">
                </div>
                <div>
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" value="alex@bankku.com">
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input type="password" class="form-input" value="••••••••••••">
                </div>
                <div>
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-input" value="1992-07-14">
                </div>
                <div>
                    <label class="form-label">Present Address</label>
                    <input type="text" class="form-input" value="San Jose, California, USA">
                </div>
                <div>
                    <label class="form-label">Permanent Address</label>
                    <input type="text" class="form-input" value="San Jose, California, USA">
                </div>
                <div>
                    <label class="form-label">City</label>
                    <input type="text" class="form-input" value="San Jose">
                </div>
                <div>
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-input" value="45962">
                </div>
                <div>
                    <label class="form-label">Country</label>
                    <select class="form-input">
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>Canada</option>
                        <option>Australia</option>
                    </select>
                </div>
                <div class="col-span-2 flex justify-end pt-2">
                    <button class="btn-primary px-12">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- PREFERENCES TAB --}}
    <div id="tab-preferences" class="tab-content hidden">
        <div class="max-w-lg">
            <h3 class="text-sm font-700 text-slate-700 mb-5" style="font-weight:700;">Currency & Language</h3>
            <div class="grid grid-cols-2 gap-5 mb-8">
                <div>
                    <label class="form-label">Time Zone</label>
                    <select class="form-input">
                        <option>UTC-08:00 Pacific Time</option>
                        <option>UTC-05:00 Eastern Time</option>
                        <option>UTC+00:00 UTC</option>
                        <option>UTC+07:00 WIB (Jakarta)</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Currency</label>
                    <select class="form-input">
                        <option>USD – US Dollar</option>
                        <option>EUR – Euro</option>
                        <option>GBP – British Pound</option>
                        <option>IDR – Indonesian Rupiah</option>
                    </select>
                </div>
            </div>

            <h3 class="text-sm font-700 text-slate-700 mb-5" style="font-weight:700;">Notification</h3>
            <div class="flex flex-col gap-5">
                @php
                $notifications = [
                    ['label'=>'I send or receive digital currency','on'=>true],
                    ['label'=>'I receive merchant order','on'=>false],
                    ['label'=>'There are recommendation for my account','on'=>true],
                ];
                @endphp
                @foreach($notifications as $n)
                <div class="flex items-center justify-between">
                    <span class="text-sm text-slate-600">{{ $n['label'] }}</span>
                    <label class="toggle-switch">
                        <input type="checkbox" {{ $n['on'] ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="flex justify-end pt-8">
                <button class="btn-primary px-12">Save</button>
            </div>
        </div>
    </div>

    {{-- SECURITY TAB --}}
    <div id="tab-security" class="tab-content hidden">
        <div class="max-w-lg">
            <h3 class="text-sm font-700 text-slate-700 mb-5" style="font-weight:700;">Two Factor Authentication</h3>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 p-4 bg-slate-50 rounded-16" style="border-radius:16px;">
                <div>
                    <p class="text-sm font-600 text-slate-700" style="font-weight:600;">Enable 2FA</p>
                    <p class="text-xs text-slate-400 mt-0.5">Add an extra layer of security to your account</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <h3 class="text-sm font-700 text-slate-700 mb-5" style="font-weight:700;">Change Password</h3>
            <div class="flex flex-col gap-4">
                <div>
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-input" placeholder="Enter current password">
                </div>
                <div>
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-input" placeholder="Enter new password">
                </div>
                <div>
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" class="form-input" placeholder="Re-enter new password">
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <button class="btn-primary px-12">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
function switchTab(tab, btn) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));
    document.getElementById('tab-' + tab).classList.remove('hidden');
    btn.classList.add('active');
}
</script>
@endsection
