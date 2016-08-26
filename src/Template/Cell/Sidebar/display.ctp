<!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
<div class="sidebar" data-color="blue" data-image="img/sidebar-5.jpg">
    <div class="sidebar-wrapper" >
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                <?= $name ?>
            </a>
        </div>

        <ul class="nav">
            <?php foreach ($items as $item): ?>
                <li>
                    <?= $this->Html->link("<p>" . $item['label'] . "</p>", $item['url'], ['escape' => false]) ?>
                </li>
            <?php endforeach ?>
            <li class="active">
                <a href="user.html">
                    <i class="pe-7s-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="table.html">
                    <i class="pe-7s-note2"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li>
                <a href="typography.html">
                    <i class="pe-7s-news-paper"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a href="icons.html">
                    <i class="pe-7s-science"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="maps.html">
                    <i class="pe-7s-map-marker"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
    		<li class="active-pro">
                <a href="upgrade.html">
                    <i class="pe-7s-rocket"></i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>