<nav>
    @auth
        <a class='textLink' href='/dashboard'>Dashboard</a>
        <a class='textLink' href='/logout'>Logout</a>
    @endauth
    @guest
        <a class='textLink' href='/login'>Login</a>
    @endguest
    @php
        $menuItems = \App\Models\Menu::all();
        foreach ($menuItems as $menuItem) {
            $route = strtolower($menuItem->name);
            echo "<a class='textLink' href='/article/$route'>$menuItem->name</a>";
        }
    @endphp
</nav>
<div class="header__navUnderline"></div>