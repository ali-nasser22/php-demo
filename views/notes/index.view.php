<?php
require_once BASE_PATH.'views/partials/head.php';
require_once BASE_PATH.'views/partials/nav.php';
require_once BASE_PATH.'views/partials/banner.php';
?>
    <main class="text-white font-mono">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col justify-center items-center">
            <div>
                <?php if (empty($notes)) : ?>
                    <h1 class="text-2xl mb-6">No notes Found !</h1>
                <?php else : ?>
                    <h1 class="text-2xl mb-6 text-center">Notes for <?= $user['name'] ?></h1>
                    <ul class="flex flex-col gap-4">
                        <?php foreach ($notes as $note) : ?>
                            <li class="p-8 bg-gray-400 text-black shadow-lg w-2xl line-clamp-1">
                                <a class="hover:underline" href="/note?id=<?= $note['id'] ?>">
                                    <?= $note['body'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </main>
<?php
require_once BASE_PATH.'views/partials/foot.php';
?>