        <div id="head">
            <h1>
                <a href="{{ url('/top') }}">
                    <img src="images/atlas.png">
                </a>
            </h1>

            <div id="">
                <div id="">
                    <p>◯◯さん</p>
                </div>

                <ul>
                    <li><a href="{{ url('/top') }}">ホーム</a></li>
                    <li><a href="{{ url('/profile') }}">プロフィール</a></li>
                    <li><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>

        </div>
