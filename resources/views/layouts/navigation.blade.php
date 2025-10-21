<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


<div id="head">
    <h1>
        <a href="{{ url('/top') }}">
            <img src="images/atlas.png">
        </a>
    </h1>

    <div id="menu">
        <div id="user-info">
            <p>◯◯さん</p>
            <button id="toggle-menu" style="cursor:pointer;">
                <i id="arrow" class="fas fa-angle-down"></i>
            </button>
        </div>
<!-- ↑アコーディオンメニュー -->


<ul id="menu-items" style="display: none;">
    <li><a href="{{ url('/top') }}">ホーム</a></li>
    <li><a href="{{ url('/profile') }}">プロフィール</a></li>
    <li><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
</ul>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</div>

</div>


<!-- アコーディオンメニュー -->
<script>
const toggleButton = document.getElementById('toggle-menu');
const menuItems = document.getElementById('menu-items');
const arrow = document.getElementById('arrow');

toggleButton.addEventListener('click', () => {
    const isHidden = menuItems.style.display === 'none' || menuItems.style.display === '';
    menuItems.style.display = isHidden ? 'block' : 'none';

    arrow.classList.toggle('fa-angle-down', !isHidden);
    arrow.classList.toggle('fa-angle-up', isHidden);
});
</script>
