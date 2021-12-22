<nav>
    @auth
        <a class='textLink' href='/dashboard'>Dashboard</a>
        <a class='textLink' href='/logout'>Logout</a>
    @endauth
    @guest
        <a class='textLink' href='/login'>Login</a>
    @endguest
    @php
        $pageItems = \App\Models\Page::all();
        foreach ($pageItems as $pageItem) {
            $route = strtolower($pageItem->name);
            echo "<a class='textLink' href='/$route'>$pageItem->name</a>";
        }
    @endphp
</nav>
<div class="header__navUnderline"></div>