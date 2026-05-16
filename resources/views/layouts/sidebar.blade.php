<style>
.sidebar {
    width: 230px;
    background: linear-gradient(180deg, #0d0f1e 0%, #131629 100%);
    height: 100vh; position: fixed; top: 0; left: 0; z-index: 40;
    overflow-y: auto; border-right: 1px solid rgba(255,255,255,0.06);
    padding-top: 80px; font-family: 'Inter', sans-serif; display: none;
}
@media(min-width:640px){ .sidebar{ display:block; } }
.sidebar::-webkit-scrollbar{ width:3px; }
.sidebar::-webkit-scrollbar-thumb{ background:rgba(99,102,241,0.3); border-radius:4px; }

.sb-inner { padding: 1rem 0.85rem 2rem; }
.sb-section-label {
    font-size: 0.62rem; font-weight: 700; letter-spacing: 0.12em;
    color: rgba(255,255,255,0.2); padding: 0.75rem 0.75rem 0.3rem;
    text-transform: uppercase;
}
.sidebar a {
    display: flex; align-items: center; gap: 0.7rem;
    padding: 0.65rem 0.85rem; border-radius: 12px;
    color: rgba(255,255,255,0.5); text-decoration: none;
    font-size: 0.84rem; font-weight: 500;
    transition: all 0.2s; margin-bottom: 2px; position: relative;
    overflow: hidden;
}
.sidebar a::before {
    content:''; position:absolute; left:0; top:0; bottom:0; width:3px;
    background: linear-gradient(135deg, #6366f1, #06b6d4);
    border-radius:0 3px 3px 0; opacity:0; transition:opacity 0.2s;
}
.sidebar a:hover { background: rgba(99,102,241,0.1); color: white; }
.sidebar a:hover::before { opacity: 1; }
.sidebar a svg { width:16px; height:16px; fill:currentColor; opacity:0.7; flex-shrink:0; }
.sidebar a:hover svg { opacity: 1; }
.sb-sep { border:none; border-top:1px solid rgba(255,255,255,0.05); margin:0.5rem 0; }

/* Online-School tag at bottom */
.sb-footer {
    padding: 1.25rem 1.1rem;
    margin-top: 1rem;
    border-top: 1px solid rgba(255,255,255,0.05);
}
.sb-footer-brand {
    font-size: 0.72rem; font-weight: 700; color: rgba(255,255,255,0.2);
    letter-spacing: 0.05em;
}
.sb-footer-brand em { color: #6366f1; font-style: normal; }
</style>

<div class="sidebar">
    <div class="sb-inner">
        <div class="sb-section-label">Main</div>
        <a href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4.1-2.8.1-4.2.1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2.1-2.4.2-3.6.2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9.1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
            Dashboard
        </a>

        @role('Admin')
        <hr class="sb-sep">
        <div class="sb-section-label">Management</div>
        <a href="{{ route('teacher.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>
            Teachers
        </a>
        <a href="{{ route('subject.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            Subjects
        </a>
        <a href="{{ route('classes.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
            Classes
        </a>
        <a href="{{ route('parents.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c70.7 0 128 57.3 128 128s-57.3 128-128 128S96 198.7 96 128 153.3 0 224 0zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 39.5-161.2c77.2 12 136.3 78.8 136.3 159.4c0 17-13.8 30.7-30.7 30.7H265.1 182.9 30.7C13.8 512 0 498.2 0 481.3c0-80.6 59.1-147.4 136.3-159.4l39.5 161.2 33.4-123.9z"/></svg>
            Parents
        </a>
        <a href="{{ route('student.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439 44.5 448 55.9 448 69.1s-9 24.6-19.3 28.6L352 122.2V320c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V122.2L48 103.7V384H400V368c0-8.8 7.2-16 16-16s16 7.2 16 16v32c0 8.8-7.2 16-16 16H32c-8.8 0-16-7.2-16-16V96C16 82 25 70.5 35.3 66.6l184-40zM224 288a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"/></svg>
            Students
        </a>

        <hr class="sb-sep">
        <div class="sb-section-label">Reports</div>
        <a href="{{ route('attendance.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192z"/></svg>
            Attendance
        </a>

        <hr class="sb-sep">
        <div class="sb-section-label">Admin</div>
        <a href="{{ route('assignrole.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.7 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2L269.4 2.9z"/></svg>
            Assign Role
        </a>
        <a href="{{ route('roles-permissions') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z"/></svg>
            Roles &amp; Permissions
        </a>
        @endrole
    </div>
    <div class="sb-footer">
        <div class="sb-footer-brand">Online<em>-School</em> &copy; {{ date('Y') }}</div>
    </div>
</div>