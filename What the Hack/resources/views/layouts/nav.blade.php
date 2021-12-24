<nav>
    @php
        $pageItems = \App\Models\Page::all();
        foreach ($pageItems as $pageItem) {
            $route = strtolower($pageItem->name);
            echo "<a class='textLink' href='/$route'>$pageItem->name</a>";
        }
    @endphp
    @auth
        <a class='textLink' href='/dashboard'>Dashboard</a>
        <a class='textLink' href='/logout'>Logout</a>
    @endauth
    @guest
        <a class='textLink' href='/login'>Login</a>
    @endguest
</nav>
<div class="header__navUnderline"></div>
