<footer class="footer footer-horizontal footer-center bg-base-200 text-base-content rounded p-10 mt-50">
    <nav class="grid grid-flow-col gap-4">
        <a href="http://localhost:8000/?controller=page&action=about" class="link link-hover">A propos</a>
        <a href="http://localhost:8000/?controller=page&action=contact" class="link link-hover">Contact</a>
        <a href="http://localhost:8000/?controller=page&action=register" class="link link-hover">Connexion</a>
        <a href="http://localhost:8000/?controller=page&action=register" class="link link-hover">Inscription</a>
    </nav>
    <aside>
        <p>Copyright © 2025 - All right reserved by Eco'ride - <a href="http://localhost:8000/?controller=page&action=mentions" class="link link-hover">Mentions légales</a></p>
    </aside>
</footer>
<?php if (isset($page_script)): ?>
        <script src="<?php echo $page_script; ?>"></script>
    <?php endif; ?>
</body>

</html>