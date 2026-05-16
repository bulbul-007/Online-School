<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
.navbar {
    font-family: 'Inter', sans-serif;
    background: rgba(13,15,30,0.9);
    backdrop-filter: blur(24px);
    border-bottom: 1px solid rgba(255,255,255,0.07);
    padding: 0 1.5rem;
    display: flex; align-items: center; justify-content: space-between;
    height: 64px;
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    box-shadow: 0 4px 30px rgba(0,0,0,0.5);
}
.nb-brand { display: flex; align-items: center; gap: 0.7rem; text-decoration: none; }
.nb-brand-icon {
    width: 38px; height: 38px; border-radius: 11px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 0 20px rgba(99,102,241,0.5);
    transition: box-shadow 0.3s;
}
.nb-brand:hover .nb-brand-icon { box-shadow: 0 0 35px rgba(99,102,241,0.8); }
.nb-brand-icon svg { width: 20px; height: 20px; fill: white; }
.nb-brand-name { font-size: 1rem; font-weight: 800; color: white; letter-spacing: -0.02em; }
.nb-brand-name em { color: #a78bfa; font-style: normal; }

.nb-right { display: flex; align-items: center; gap: 0.75rem; position: relative; }

.nb-bell {
    width: 36px; height: 36px; border-radius: 10px;
    background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.07);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all 0.2s; position: relative;
}
.nb-bell:hover { background: rgba(99,102,241,0.15); border-color: rgba(99,102,241,0.4); }
.nb-bell svg { width: 16px; height: 16px; fill: rgba(255,255,255,0.6); }
.nb-bell-dot {
    width: 7px; height: 7px; border-radius: 50%; background: #6366f1;
    position: absolute; top: 6px; right: 6px; border: 1.5px solid #0d0f1e;
    animation: nb-blink 2s infinite;
}
@keyframes nb-blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

.nb-user {
    display: flex; align-items: center; gap: 0.6rem; cursor: pointer;
    padding: 0.3rem 0.65rem 0.3rem 0.35rem; border-radius: 100px;
    background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.07);
    transition: all 0.2s; user-select: none;
}
.nb-user:hover { background: rgba(99,102,241,0.12); border-color: rgba(99,102,241,0.3); }
.nb-user img { width: 30px; height: 30px; border-radius: 50%; border: 2px solid #6366f1; object-fit: cover; }
.nb-user-name { font-size: 0.82rem; font-weight: 600; color: white; }
.nb-user-chevron { width: 14px; height: 14px; stroke: #a78bfa; fill: none; transition: transform 0.25s; }

.nb-dropdown {
    display: none; position: absolute; top: calc(100% + 10px); right: 0;
    width: 210px; background: #1a1c35;
    border: 1px solid rgba(255,255,255,0.1); border-radius: 18px;
    box-shadow: 0 25px 80px rgba(0,0,0,0.6); overflow: hidden;
}
.nb-dropdown.open { display: block; animation: nb-fade 0.2s ease; }
@keyframes nb-fade { from{opacity:0;transform:translateY(-8px)} to{opacity:1;transform:translateY(0)} }
.nb-dropdown-header { padding: 1rem 1.1rem 0.75rem; border-bottom: 1px solid rgba(255,255,255,0.07); }
.nb-dropdown-header .dn { font-size: 0.85rem; font-weight: 700; color: white; }
.nb-dropdown-header .de { font-size: 0.72rem; color: rgba(255,255,255,0.35); }
.nb-dropdown a, .nb-dropdown button {
    display: flex; align-items: center; gap: 0.7rem;
    padding: 0.7rem 1.1rem; font-size: 0.84rem; font-weight: 500;
    color: rgba(255,255,255,0.6); background: none; border: none;
    width: 100%; text-align: left; text-decoration: none;
    cursor: pointer; font-family: 'Inter', sans-serif; transition: all 0.15s;
}
.nb-dropdown a:hover, .nb-dropdown button:hover { background: rgba(99,102,241,0.12); color: white; }
.nb-dropdown svg { width: 15px; height: 15px; fill: rgba(255,255,255,0.4); }
.nb-dropdown a:hover svg, .nb-dropdown button:hover svg { fill: #a78bfa; }
.nb-sep { border: none; border-top: 1px solid rgba(255,255,255,0.07); margin: 0; }

.nb-login-btn {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: white; font-size: 0.85rem; font-weight: 700;
    padding: 0.5rem 1.2rem; border-radius: 100px; text-decoration: none;
    box-shadow: 0 4px 20px rgba(99,102,241,0.45);
    transition: all 0.2s; font-family: 'Inter', sans-serif;
}
.nb-login-btn:hover { transform: translateY(-1px); box-shadow: 0 6px 28px rgba(99,102,241,0.6); }
.nb-login-btn svg { width: 14px; height: 14px; fill: white; }
</style>

<nav class="navbar">
    <a href="{{ route('home') }}" class="nb-brand">
        <div class="nb-brand-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96H48C21.5 96 0 117.5 0 144V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H473.7L337.8 5.4zM256 416c0-35.3 28.7-64 64-64s64 28.7 64 64v96H256V416z"/></svg>
        </div>
        <span class="nb-brand-name">Online<em>-School</em></span>
    </a>

    <div class="nb-right">
        @auth
            <div class="nb-bell">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v25.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm64 352H160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7 33.3-6.7 45.3-18.7 18.7-28.3 18.7-45.3z"/></svg>
                <span class="nb-bell-dot"></span>
            </div>
            <div class="nb-user" id="opennavdropdown">
                <img src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="Avatar">
                <span class="nb-user-name">{{ auth()->user()->name }}</span>
                <svg class="nb-user-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </div>
            <div class="nb-dropdown" id="navdropdown">
                <div class="nb-dropdown-header">
                    <div class="dn">{{ auth()->user()->name }}</div>
                    <div class="de">{{ auth()->user()->email }}</div>
                </div>
                <a href="{{ route('profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                    My Profile
                </a>
                <hr class="nb-sep">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64z"/></svg>
                        Sign Out
                    </button>
                </form>
            </div>
        @else
            @if (Route::has('login'))
                <a class="nb-login-btn" href="{{ route('login') }}">Sign In →</a>
            @endif
        @endauth
    </div>
</nav>

<script>
(function(){
    var t=document.getElementById('opennavdropdown'), d=document.getElementById('navdropdown');
    if(t&&d){
        t.addEventListener('click',function(e){e.stopPropagation();d.classList.toggle('open');});
        document.addEventListener('click',function(){d.classList.remove('open');});
    }
})();
</script>