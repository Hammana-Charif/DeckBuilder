<header>
    <nav id="head">
        <div class="nav-wrapper #000000 black">
            <a href="/cards" class="brand-logo">Magic The Gathering Deck Builder</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/cards">Card</a></li>
                <?php if (@$_SESSION["username"]) { ?>
                    <li><a href="/deck">Deck</a></li>
                <?php } else echo ""; ?>
                <li><a href="/user?login">Log In</a></li>
                <li><a href="/user?create">Sign In</a></li>
            </ul>
            <div id="nav-mobile" class="center hide-on-med-and-down">
                <?php if (@$_SESSION["username"]) { ?>
                    <?php foreach ($_SESSION["username"] as $value): ?>
                        Welcome <?= $value; ?>. Click here to <a href="/cards/logout">logout</a>
                    <?php endforeach; ?>
                <?php } else echo "<a>Disconnected</a>"; ?>
            </div>
        </div>
    </nav>
</header>