<template>
    <div class="bg-light-75">
        <div class="w-full min-h-screen text-dark-100 flex">
            <aside class="w-72 border-r border-dark-25 bg-white">
                <a href="" class="h-24 px-4 flex items-center justify-between border-b border-dark-25">
                    <img src="../assets/img/logo.png" alt="" class="w-14" />
                    <div>
                        <p class="text-h7 font-h1">SMK Immanuel</p>
                        <p class="text-caption">Smart, Wise, Accountable</p>
                    </div>
                </a>

                <nav class="text-primary-red">
                    <ul>
                        <li class="mt-1">
                            <a href="">
                                <span><font-awesome-icon icon="fa-solid fa-clipboard" /></span>
                                <span>Event</span>
                            </a>
                            <ul>
                                <li class="mt-1">
                                    <a href=""
                                        ><span><font-awesome-icon icon="fa-solid fa-clipboard" /></span>
                                        <span>List Event</span>
                                    </a>
                                </li>
                                <li class="mt-1">
                                    <a href=""
                                        ><span><font-awesome-icon icon="fa-solid fa-clipboard" /></span>
                                        <span>Buat Event</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </aside>

            <main class="flex-1 flex flex-col">
                <div class="h-24 px-16 flex items-center justify-end text-dark-50 bg-white">
                    <p class="text-h7 font-h7">Hai, <span class="font-bold">Jeki Gates</span></p>
                </div>

                <div class="px-16 py-16">
                    <div class="px-16 py-16 text-dark-50 bg-white rounded-lg">
                        <p class="text-h7 font-h7">Welcome, <span class="font-bold">Jeki Gates</span></p>
                    </div>
                </div>

                <div class="h-24 px-16 flex items-center justify-end text-dark-50 bg-white mt-auto">
                    <p class="text-body font-body"><span class="font-bold">2021-2022</span> SMK IMMANUEL | Made with by IT CLUB</p>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: "EventView",
};
</script>
