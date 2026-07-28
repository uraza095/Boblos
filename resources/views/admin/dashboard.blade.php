@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('main_content')
<style>
  :root {
    --bg: #e7e0d6;
    --card: rgba(255, 255, 255, 0.15);
    --card-white: rgba(255, 255, 255, 0.2);
    --dark-icon: rgba(238, 124, 139, 0.6);
    --text-main: #ffffff;
    --text-mute: #fce4e8;
    --text-mute-2: rgba(255, 255, 255, 0.55);
    --accent-orange: #dd8a4e;
    --accent-orange-2: #c96f3a;
    --track-mauve: rgba(255, 255, 255, 0.15);
    --line: rgba(255, 255, 255, 0.1);
    --radius-lg: 10px;
    --radius-md: 10px;
    --radius-sm: 10px;
  }

  /* Override typography colors in main panel */
  main h1, main h2, main h3, main h4, main h5, main h6 {
    color: #ffffff !important;
  }
  main span, main p, main td, main th, main a {
    color: rgba(255, 255, 255, 0.85) !important;
  }

  .dashboard-wrapper {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 20px;
  }

  .col-left, .col-right {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  /* ===== Stats row ===== */
  .stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04)) !important;
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    border-radius: var(--radius-lg);
    padding: 26px 30px;
  }
  .stat {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .stat-icon {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }
  .stat-icon svg { width: 18px; height: 18px; }
  .stat-label { font-size: 12.5px; color: var(--text-mute) !important; margin: 0 0 3px; }
  .stat-value { font-size: 17px; font-weight: 700; color: #ffffff !important; }

  /* ===== Generic card ===== */
  .dashboard-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.04)) !important;
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    border-radius: var(--radius-lg);
    padding: 26px 28px;
  }

  /* ===== KPI card ===== */
  .kpi-card {
    display: grid;
    grid-template-columns: 1.4fr 0.8fr;
    gap: 26px;
  }
  .kpi-header-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
  }
  .kpi-title { font-size: 16px; font-weight: 700; color: #ffffff !important; }
  .range-pill {
    background: rgba(255, 255, 255, 0.1) !important;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 20px;
    padding: 8px 16px;
    font-size: 12.5px;
    color: var(--text-mute) !important;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
    white-space: nowrap;
    cursor: pointer;
  }

  .kpi-score { font-size: 40px; font-weight: 800; letter-spacing: -1px; margin: 4px 0 2px; color: #ffffff !important; }
  .kpi-delta { font-size: 13px; color: #f87171 !important; font-weight: 600; margin-bottom: 26px; }

  .bars {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    height: 160px;
    gap: 14px;
    position: relative;
    padding-left: 34px;
  }
  .y-axis {
    position: absolute;
    left: 0; top: 0;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    font-size: 10px;
    color: var(--text-mute-2) !important;
  }
  .bar-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    flex: 1;
    height: 100%;
    justify-content: flex-end;
  }
  .bar-stack {
    width: 18px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    gap: 4px;
  }
  .bar-track {
    width: 100%;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.15);
  }
  .bar-fill {
    width: 100%;
    border-radius: 20px;
    background: linear-gradient(180deg, #fce4e8, #dd8a4e);
  }
  .bar-month { font-size: 11px; color: var(--text-mute-2) !important; }

  /* ===== Top performance ===== */
  .top-perf-header { font-size: 18px; font-weight: 700; color: #ffffff !important; margin: 0 0 14px; }
  .perf-list {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(42px);
    -webkit-backdrop-filter: blur(14px);
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: var(--radius-md);
    padding: 16px 18px;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .perf-item { display: flex; align-items: center; gap: 12px; }
  .avatar-wrap { position: relative; flex-shrink: 0; }
  .avatar { width: 38px; height: 38px; border-radius: 50%; object-fit: cover; display: block; }
  .avatar-badge {
    position: absolute;
    bottom: -3px; left: -3px;
    width: 17px; height: 17px;
    border-radius: 50%;
    border: 2px solid rgba(238, 124, 139, 0.6);
    display: flex; align-items: center; justify-content: center;
    font-size: 8px;
    font-weight: 700;
    color: #fff;
  }
  .perf-name { font-size: 13px; font-weight: 600; color: #ffffff !important; }
  .perf-sub { font-size: 11.5px; color: var(--text-mute) !important; }

  /* ===== Employees table ===== */
  .table-title { font-size: 16px; font-weight: 700; color: #ffffff !important; margin: 0 0 20px; }
  table { width: 100%; border-collapse: collapse; }
  th {
    text-align: left;
    font-size: 12px;
    font-weight: 500;
    color: var(--text-mute) !important;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--line) !important;
  }
  td {
    padding: 16px 0;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.9) !important;
    border-bottom: 1px solid var(--line) !important;
  }
  tr:last-child td { border-bottom: none !important; }
  .role-cell { font-weight: 500; color: rgba(255, 255, 255, 0.7) !important; }
  .perf-bar-track {
    width: 100px;
    height: 6px;
    border-radius: 4px;
    background: rgba(255, 255, 255, 0.15);
    position: relative;
    display: inline-block;
    vertical-align: middle;
  }
  .perf-bar-fill {
    position: absolute; left: 0; top: 0; bottom: 0;
    border-radius: 4px;
    background: linear-gradient(90deg, #fce4e8, #dd8a4e);
  }
  .dots { color: var(--text-mute-2) !important; font-weight: 700; letter-spacing: 1px; cursor: pointer; }

  /* ===== Upcoming meeting ===== */
  .card-dark {
    background: radial-gradient(circle at 85% 10%, rgba(238, 124, 139, 0.35) 0%, rgba(45, 12, 24, 0.85) 45%, #1d060e 100%) !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.06);
    color: #fff;
    position: relative;
    overflow: hidden;
    padding: 26px 26px 0;
    display: flex;
    flex-direction: column;
    height: 300px;
  }
  .ring-decor {
    position: absolute;
    top: -70px; right: -70px;
    width: 240px; height: 240px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.07);
  }
  .ring-decor::before {
    content: "";
    position: absolute;
    top: 40px; left: 40px; right: 40px; bottom: 40px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.06);
  }
  .meeting-title { font-size: 17px; font-weight: 700; color: #ffffff !important; margin: 0 0 18px; position: relative; z-index: 1; }
  .meeting-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
    z-index: 1;
    flex: 1;
    overflow: hidden;
    -webkit-mask-image: linear-gradient(180deg, #000 60%, transparent 96%);
    mask-image: linear-gradient(180deg, #000 60%, transparent 96%);
  }
  .meeting-item { display: flex; gap: 10px; }
  .meeting-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: rgba(255, 255, 255, 0.45);
    margin-top: 7px; flex-shrink: 0;
  }
  .meeting-name { font-size: 13px; font-weight: 600; color: #ffffff !important; margin-bottom: 2px; }
  .meeting-time { font-size: 11px; color: rgba(255, 255, 255, 0.4) !important; margin-bottom: 10px; }
  .meeting-avatars { display: flex; }
  .meeting-avatars img {
    width: 24px; height: 24px; border-radius: 50%;
    border: 2px solid rgba(10, 20, 4, 0.8);
    margin-left: -8px; object-fit: cover;
  }
  .meeting-avatars img:first-child { margin-left: 0; }

  /* ===== Working format ===== */
  .wf-title { font-size: 16px; font-weight: 700; color: #ffffff !important; margin: 0 0 4px; }
  .wf-list { display: flex; flex-direction: column; gap: 14px; margin-top: 16px; }
  .wf-row {
    display: flex; align-items: center; justify-content: space-between;
    border-radius: var(--radius-sm);
    padding: 16px 18px;
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  .wf-onsite { 
    background: linear-gradient(to right, rgb(255 255 255 / 2%) 33%, rgb(255 255 255 / 38%) 67%);
    border: none;
   }
  .wf-hybrid { 
    background: linear-gradient(to right, rgb(255 255 255 / 2%) 33%, rgb(255 255 255 / 38%) 67%);
    border: none;
  }
  .wf-remote { 
    background: linear-gradient(to right, rgb(255 255 255 / 2%) 33%, rgb(255 255 255 / 38%) 67%);
    border: none;
   }
  .wf-label { font-size: 12px; color: var(--text-mute) !important; margin-bottom: 4px; }
  .wf-value { font-size: 17px; font-weight: 700; color: #ffffff !important; }
  .wf-pct { font-size: 14px; font-weight: 700; color: #dd8a4e !important; }

  @media (max-width: 900px) {
    .dashboard-wrapper { grid-template-columns: 1fr; }
    .stats-row { grid-template-columns: 1fr; }
    .kpi-card { grid-template-columns: 1fr; }
  }
</style>

<div class="dashboard-wrapper">
  <div class="col-left">

    <!-- Stats row -->
    <div class="stats-row">
      <div class="stat">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="#fce4e8" stroke-width="1.8"><circle cx="9" cy="7" r="3"/><circle cx="17" cy="9" r="2.4"/><path d="M3 20c0-3 2.5-5 6-5s6 2 6 5"/><path d="M15 20c0-2.2-1-4-2.8-4.7"/></svg>
        </div>
        <div>
          <p class="stat-label">Total Reservations</p>
          <p class="stat-value">{{ $reservationsCount }} tables</p>
        </div>
      </div>
      <div class="stat">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="#fce4e8" stroke-width="1.8"><path d="M3 8l9-4 9 4-9 4-9-4z"/><path d="M3 8v8l9 4 9-4V8"/><path d="M12 12v8"/></svg>
        </div>
        <div>
          <p class="stat-label">Menu Items</p>
          <p class="stat-value">{{ $itemsCount }} active</p>
        </div>
      </div>
      <div class="stat">
        <div class="stat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="#fce4e8" stroke-width="1.8"><circle cx="12" cy="8" r="4.2"/><path d="M8.5 11.5L6 21l6-3 6 3-2.5-9.5"/></svg>
        </div>
        <div>
          <p class="stat-label">Feedback Score</p>
          <p class="stat-value">4.8 / 5.0</p>
        </div>
      </div>
    </div>

    <!-- KPI card -->
    <div class="dashboard-card kpi-card">
      <div>
        <div class="kpi-header-row">
          <span class="kpi-title">Order Flow Rate</span>
        </div>
        <div class="kpi-score">92.4%</div>
        <div class="kpi-delta">+ 1.8% vs last month</div>
        <div class="bars">
          <div class="y-axis"><span>100%</span><span>75%</span><span>50%</span><span>25%</span><span>0%</span></div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:52%;"></div>
              <div class="bar-fill" style="height:44%;"></div>
            </div>
            <span class="bar-month">Feb</span>
          </div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:14%;"></div>
              <div class="bar-fill" style="height:82%;"></div>
            </div>
            <span class="bar-month">Mar</span>
          </div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:12%;"></div>
              <div class="bar-fill" style="height:86%;"></div>
            </div>
            <span class="bar-month">Apr</span>
          </div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:14%;"></div>
              <div class="bar-fill" style="height:82%;"></div>
            </div>
            <span class="bar-month">May</span>
          </div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:56%;"></div>
              <div class="bar-fill" style="height:36%;"></div>
            </div>
            <span class="bar-month">Jun</span>
          </div>
          <div class="bar-group">
            <div class="bar-stack">
              <div class="bar-track" style="height:38%;"></div>
              <div class="bar-fill" style="height:48%;"></div>
            </div>
            <span class="bar-month">Jul</span>
          </div>
        </div>
      </div>

      <div>
        <div class="kpi-header-row" style="justify-content: flex-end; margin-bottom: 8px;">
          <span class="range-pill">Past 30 days ▾</span>
        </div>
        <div class="perf-list">
          <h4 class="top-perf-header" style="margin: 0 0 18px 0;">Popular Dishes</h4>
          @php
              $featuredItems = \App\Models\MenuItem::with('category')->where('featured', true)->latest()->take(4)->get();
              if ($featuredItems->isEmpty()) {
                  $featuredItems = \App\Models\MenuItem::with('category')->latest()->take(4)->get();
              }
              // Define some random color codes for badges
              $badgeColors = ['#2b3a55', '#2f7d6b', '#6b4a8c', '#3a3630'];
          @endphp
          @forelse($featuredItems as $index => $item)
              <div class="perf-item">
                <div class="avatar-wrap">
                  @if ($item->image)
                      <img class="avatar" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                  @else
                      <img class="avatar" src="{{ asset('images/resource/cat-' . (($index % 3) + 1) . '.jpg') }}" alt="{{ $item->name }}">
                  @endif
                </div>
                <div>
                  <p class="perf-name">{{ $item->name }}</p>
                  <p class="perf-sub">Rs. {{ number_format($item->price) }} · {{ $item->category->name ?? 'Dish' }}</p>
                </div>
              </div>
          @empty
              <div class="text-xs text-white/50 text-center py-4">No menu items found.</div>
          @endforelse
        </div>
      </div>
    </div>

    <!-- Reservations table -->
    <div class="dashboard-card">
      <p class="table-title">Recent Reservations</p>
      <table>
        <thead>
          <tr><th>ID</th><th>Guest Name</th><th>Type / Time</th><th>Party Size</th><th></th></tr>
        </thead>
        <tbody>
          <tr>
            <td>RES001246</td>
            <td class="font-bold">Judy Abbott</td>
            <td class="role-cell">Dine-in (20:00)</td>
            <td><span class="perf-bar-track"><span class="perf-bar-fill" style="width:78%;"></span></span></td>
            <td class="dots">⋯</td>
          </tr>
          <tr>
            <td>RES001243</td>
            <td class="font-bold">Martin Feeney</td>
            <td class="role-cell">Dine-in (19:30)</td>
            <td><span class="perf-bar-track"><span class="perf-bar-fill" style="width:55%;"></span></span></td>
            <td class="dots">⋯</td>
          </tr>
          <tr>
            <td>RES004637</td>
            <td class="font-bold">Ellen Streich</td>
            <td class="role-cell">Online Delivery</td>
            <td><span class="perf-bar-track"><span class="perf-bar-fill" style="width:40%;"></span></span></td>
            <td class="dots">⋯</td>
          </tr>
          <tr>
            <td>RES001535</td>
            <td class="font-bold">Ellis Lubowitz</td>
            <td class="role-cell">Dine-in (21:00)</td>
            <td><span class="perf-bar-track"><span class="perf-bar-fill" style="width:65%;"></span></span></td>
            <td class="dots">⋯</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

  <div class="col-right">

    <!-- Upcoming reservations -->
    <div class="dashboard-card card-dark">
      <div class="ring-decor"></div>
      <p class="meeting-title">Upcoming Reservations</p>
      <div class="meeting-list">
        <div class="meeting-item">
          <div class="meeting-dot"></div>
          <div>
            <p class="meeting-name">Table for 4 - Dinner Party</p>
            <p class="meeting-time">Today 18:00-20:00</p>
            <div class="meeting-avatars">
              <img src="https://i.pravatar.cc/60?img=15" alt="">
              <img src="https://i.pravatar.cc/60?img=22" alt="">
              <img src="https://i.pravatar.cc/60?img=8" alt="">
            </div>
          </div>
        </div>
        <div class="meeting-item">
          <div class="meeting-dot"></div>
          <div>
            <p class="meeting-name">Table for 2 - Anniversary</p>
            <p class="meeting-time">Today 20:00-21:30</p>
            <div class="meeting-avatars">
              <img src="https://i.pravatar.cc/60?img=33" alt="">
              <img src="https://i.pravatar.cc/60?img=44" alt="">
            </div>
          </div>
        </div>
        <div class="meeting-item">
          <div class="meeting-dot"></div>
          <div>
            <p class="meeting-name">Table for 6 - Family Dinner</p>
            <p class="meeting-time">Today 21:00-23:00</p>
            <div class="meeting-avatars">
              <img src="https://i.pravatar.cc/60?img=5" alt="">
              <img src="https://i.pravatar.cc/60?img=51" alt="">
              <img src="https://i.pravatar.cc/60?img=60" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Working Format -->
    <div class="dashboard-card">
      <p class="wf-title">Orders Format</p>
      <div class="wf-list">
        <div class="wf-row wf-onsite">
          <div><p class="wf-label">Dine-in</p><p class="wf-value">13,982</p></div>
          <span class="wf-pct">11.4%</span>
        </div>
        <div class="wf-row wf-hybrid">
          <div><p class="wf-label">Takeaway</p><p class="wf-value">26,214</p></div>
          <span class="wf-pct">32.2%</span>
        </div>
        <div class="wf-row wf-remote">
          <div><p class="wf-label">Delivery</p><p class="wf-value">41,214</p></div>
          <span class="wf-pct">56.4%</span>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
