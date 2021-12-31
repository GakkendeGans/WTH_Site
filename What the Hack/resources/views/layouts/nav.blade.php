<nav>
    @php
        $pageItems = \App\Models\Page::all();
        foreach ($pageItems as $pageItem) {
            if ($pageItem->name != 'Home') {
                $route = strtolower($pageItem->name);
                echo "<a class='textLink item' href='/$route'>$pageItem->name</a>";
            }
        }
    @endphp
    @auth
        <div class="dropdown item">
            <button class="dropbtn">Create/Edit</button>
            <div class="dropdown-content">
                <a href="/user">Users</a>
                <a href="/page">Pages</a>
                <a href="/article">Articles</a>
                <!-- <a href="/viewtype">Viewtypes</a> -->
            </div>
        </div>
        <a class='textLink' href='/logout'>Logout</a>
    @endauth
    @guest
        <a class='textLink' href='/login'>Login</a>
    @endguest
</nav>
<div class="header__navUnderline"></div>
