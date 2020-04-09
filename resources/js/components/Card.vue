<template>
    <div :class="mountHeader" style="max-width: 18rem;">
        <div class="card-header">{{ header }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ title }}</h5>
            <p class="card-text"><slot></slot></p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['textcolor', 'bgcolor', 'size', 'header', 'title'],

        computed: {
            mountHeader: function () {
                return `card ${this.textcolor} ${this.bgcolor} ${this.size}`
            }
        }
    }
</script>

<style scoped>

</style>
