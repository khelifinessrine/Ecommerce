<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/home.php">
                    <span data-feather="home"></span>
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/produits/liste.php">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/visiteurs/liste.php">
                 <span data-feather="users"></span>
                 Customers
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/stocks/liste.php">
                    <span data-feather="bar-chart-2"></span>
                    Stocks
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/commandes/liste.php">
                    <span data-feather="bar-chart-2"></span>
                    Paniers
                </a>
            </li>

          
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/E-commerce/admin/profil.php">
                    <span data-feather="layers"></span>
                    Profile
                </a>
            </li>
        </ul>
    </div>
</nav>
<script>
    // Récupérer tous les liens de navigation
    const navLinks = document.querySelectorAll('.nav-link');
    const currentUrl = window.location.href;

    navLinks.forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });
</script>