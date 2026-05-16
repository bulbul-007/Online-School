<style>
.dash-wrap { font-family: 'Inter', sans-serif; }
.dash-header {
    margin-bottom: 2rem;
}
.dash-greeting {
    font-size: 1.6rem; font-weight: 800; color: #111827; letter-spacing: -0.03em;
}
.dash-greeting span { background: linear-gradient(135deg,#6366f1,#8b5cf6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; }
.dash-sub { font-size: 0.9rem; color: #6b7280; margin-top: 0.25rem; }

/* Stat Cards */
.stats-row { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1.25rem; margin-bottom: 2rem; }

.stat-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    box-shadow: 0 2px 16px rgba(0,0,0,0.06);
    border: 1px solid rgba(0,0,0,0.04);
    position: relative; overflow: hidden;
    transition: transform 0.25s, box-shadow 0.25s;
}
.stat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.1); }
.stat-card::before {
    content: ''; position: absolute; top: -30px; right: -30px;
    width: 120px; height: 120px; border-radius: 50%;
    opacity: 0.08;
}
.stat-card.c1::before { background: #6366f1; }
.stat-card.c2::before { background: #06b6d4; }
.stat-card.c3::before { background: #ec4899; }
.stat-card.c4::before { background: #f59e0b; }
.stat-card.c5::before { background: #10b981; }

.stat-icon {
    width: 48px; height: 48px; border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1rem;
}
.stat-icon svg { width: 22px; height: 22px; fill: white; }
.c1 .stat-icon { background: linear-gradient(135deg, #6366f1, #8b5cf6); box-shadow: 0 8px 20px rgba(99,102,241,0.35); }
.c2 .stat-icon { background: linear-gradient(135deg, #06b6d4, #6366f1); box-shadow: 0 8px 20px rgba(6,182,212,0.35); }
.c3 .stat-icon { background: linear-gradient(135deg, #ec4899, #8b5cf6); box-shadow: 0 8px 20px rgba(236,72,153,0.35); }
.c4 .stat-icon { background: linear-gradient(135deg, #f59e0b, #ef4444); box-shadow: 0 8px 20px rgba(245,158,11,0.35); }
.c5 .stat-icon { background: linear-gradient(135deg, #10b981, #06b6d4); box-shadow: 0 8px 20px rgba(16,185,129,0.35); }

.stat-num {
    font-size: 2.4rem; font-weight: 900; color: #111827;
    line-height: 1; letter-spacing: -0.04em; margin-bottom: 0.3rem;
}
.stat-label { font-size: 0.8rem; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.06em; }
.stat-badge {
    display: inline-flex; align-items: center; gap: 0.3rem;
    font-size: 0.72rem; font-weight: 600; color: #10b981;
    background: #ecfdf5; padding: 0.2rem 0.55rem; border-radius: 100px;
    margin-top: 0.5rem;
}

/* Quick Links */
.quick-title {
    font-size: 1rem; font-weight: 700; color: #111827;
    margin-bottom: 1rem; letter-spacing: -0.01em;
}
.quick-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 1rem; }
.quick-card {
    background: white; border-radius: 16px;
    padding: 1.25rem 1rem; text-align: center; text-decoration: none;
    border: 1px solid rgba(0,0,0,0.05);
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    transition: all 0.25s;
    display: flex; flex-direction: column; align-items: center; gap: 0.65rem;
}
.quick-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(99,102,241,0.15); border-color: rgba(99,102,241,0.25); }
.quick-card-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
}
.quick-card-icon svg { width: 20px; height: 20px; fill: white; }
.quick-card span { font-size: 0.82rem; font-weight: 600; color: #374151; }
</style>

<div class="dash-wrap">
    <div class="dash-header">
        <h1 class="dash-greeting">Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening') }}, <span>Admin 👋</span></h1>
        <p class="dash-sub">Here's what's happening at Online-School today.</p>
    </div>

    <div class="stats-row">
        <div class="stat-card c1">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439 44.5 448 55.9 448 69.1s-9 24.6-19.3 28.6L352 122.2V320c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V122.2L48 103.7V384H400V368c0-8.8 7.2-16 16-16s16 7.2 16 16v32c0 8.8-7.2 16-16 16H32c-8.8 0-16-7.2-16-16V96C16 82 25 70.5 35.3 66.6l184-40zM224 288a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"/></svg>
            </div>
            <div class="stat-num">{{ sprintf('%02d', count($students)) }}</div>
            <div class="stat-label">Students</div>
            <div class="stat-badge">↑ Enrolled</div>
        </div>

        <div class="stat-card c2">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>
            </div>
            <div class="stat-num">{{ sprintf('%02d', count($teachers)) }}</div>
            <div class="stat-label">Teachers</div>
            <div class="stat-badge">↑ Active</div>
        </div>

        <div class="stat-card c3">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c70.7 0 128 57.3 128 128s-57.3 128-128 128S96 198.7 96 128 153.3 0 224 0zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 39.5-161.2c77.2 12 136.3 78.8 136.3 159.4c0 17-13.8 30.7-30.7 30.7H265.1 182.9 30.7C13.8 512 0 498.2 0 481.3c0-80.6 59.1-147.4 136.3-159.4l39.5 161.2 33.4-123.9z"/></svg>
            </div>
            <div class="stat-num">{{ sprintf('%02d', count($parents)) }}</div>
            <div class="stat-label">Parents</div>
            <div class="stat-badge">↑ Registered</div>
        </div>

        <div class="stat-card c4">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            </div>
            <div class="stat-num">{{ sprintf('%02d', count($subjects)) }}</div>
            <div class="stat-label">Subjects</div>
            <div class="stat-badge">↑ Listed</div>
        </div>

        <div class="stat-card c5">
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
            </div>
            <div class="stat-num">{{ sprintf('%02d', count($classes)) }}</div>
            <div class="stat-label">Classes</div>
            <div class="stat-badge">↑ Running</div>
        </div>
    </div>

    <div class="quick-title">⚡ Quick Actions</div>
    <div class="quick-grid">
        <a href="{{ route('teacher.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5z"/></svg>
            </div>
            <span>Manage Teachers</span>
        </a>
        <a href="{{ route('student.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#06b6d4,#6366f1)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439 44.5 448 55.9 448 69.1s-9 24.6-19.3 28.6L352 122.2V320c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V122.2L48 103.7V384H400V368c0-8.8 7.2-16 16-16s16 7.2 16 16v32c0 8.8-7.2 16-16 16H32c-8.8 0-16-7.2-16-16V96C16 82 25 70.5 35.3 66.6l184-40z"/></svg>
            </div>
            <span>View Students</span>
        </a>
        <a href="{{ route('attendance.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192z"/></svg>
            </div>
            <span>Attendance</span>
        </a>
        <a href="{{ route('classes.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#10b981,#06b6d4)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192z"/></svg>
            </div>
            <span>Classes</span>
        </a>
        <a href="{{ route('subject.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#ec4899,#8b5cf6)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96z"/></svg>
            </div>
            <span>Subjects</span>
        </a>
        <a href="{{ route('assignrole.index') }}" class="quick-card">
            <div class="quick-card-icon" style="background:linear-gradient(135deg,#6366f1,#06b6d4)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.7 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2L269.4 2.9z"/></svg>
            </div>
            <span>Assign Roles</span>
        </a>
    </div>
</div>