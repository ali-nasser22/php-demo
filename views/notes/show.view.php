<?php
require_once BASE_PATH.'views/partials/head.php';
require_once BASE_PATH.'views/partials/nav.php';
?>
    <main class="text-white font-mono">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col items-center">
            <p class="self-start">
                <a href="/notes" class="text-lg"><span class="text-3xl">&larr;</span> back</a>
            </p>
            <div class="p-6 bg-gray-400 text-black w-lg">
                <p><?= $note['body'] ?></p>
            </div>
            <div class="mt-8 mr-[360px] h-auto">
                <div class="flex gap-4">
                    <button disabled class="p-2 rounded-md shadow-md bg-gray-400 hover:bg-gray-500 text-black transition-colors duration-300"><a
                                href="/notes/edit?id=<?= $note['id'] ?>">Edit</a>
                    </button>
                    <form action="/notes" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button class="p-2 rounded-md shadow-md bg-red-400 hover:bg-red-500 transition-colors duration-300">Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
require_once BASE_PATH.'views/partials/foot.php';
?>