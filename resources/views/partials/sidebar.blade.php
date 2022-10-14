<aside class="menu">
    <ul class="menu-list">
        @auth
            <li><a href="/user/{{Auth::user()->username}}">Profile</a></li>
        @endauth
        <li><a>Customers</a></li>
    </ul>
</aside>
