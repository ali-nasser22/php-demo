<?php
require_once BASE_PATH.'helpers/functions.php';
?>
<nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8"/>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" dd:"rounded-md px-3 py-2 text-sm font-medium"  -->
                        <a href="/" aria-current="page"
                           class="rounded-md px-3 py-2 text-sm font-medium <?= request_is('/') ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" ?>">Home</a>
                        <a href="/about"
                           class="rounded-md px-3 py-2 text-sm font-medium <?= request_is('/about') ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" ?>">About
                            us</a>
                        <a href="/notes"
                           class="rounded-md px-3 py-2 text-sm font-medium <?= request_is('/notes') ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" ?>">Notes</a>
                        <a href="/notes/create"
                           class="rounded-md px-3 py-2 text-sm font-medium <?= request_is('/notes/create') ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" ?>">Creat
                            note</a>
                        <a href="/contact"
                           class="rounded-md px-3 py-2 text-sm font-medium <?= request_is('/contact') ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white" ?>">Contact
                            us</a>
                    </div>
                </div>
            </div>
            <div class="gap-4 items-center flex">
                <?php if (!isset($_SESSION['user'])) : ?>
                    <button class="p-1.5 rounded-md bg-gray-400 text-black hover:bg-gray-500 transition-colors duration-300"><a
                                href="/register">Register</a></button>
                    <button class="p-1.5"><a
                                href="/login">Login</a></button>
                <?php else : ?>
                    <form action="/logout" method="POST">
                        <button class="p-1.5">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
