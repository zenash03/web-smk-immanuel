<template>
    <footer>
        <div class="container">
            <b>{{ prev }}-{{ now }}©</b> <span>SMK Immanuel | Made with ❤ by ITClub</span>
        </div>
    </footer>
</template>

<script>
export default {
    data() {
        return {
            prev: null,
            now: null
        }
    },
    created() {
        this.prev = new Date().getFullYear() - 1;
        this.now = new Date().getFullYear();
    }
}
</script>

<style scoped>

footer {
    padding: 1em 0;
    font-size: 14px;
    background-color: white;
    text-align: right;
}

@media screen and (max-width: 768px) {
    footer {
        text-align: center;
        font-size: 10px;
    }
}

@media screen and (max-width: 400px) {
    footer {
        text-align: center;
        font-size: 8px;
    }
}

</style>