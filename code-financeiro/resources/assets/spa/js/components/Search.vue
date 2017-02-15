<template>
    <div class="col s8">
        <form name="form" method="GET" @submit.prevent="submit()">
            <div class="filter-group">
                <button class="btn waves-effect" type="submit">
                    <i class="material-icons">search</i>
                </button>
                <div class="filter-wrapper">
                    <input type="text" v-model="model" placeholder="Digite aqui sua busca">
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default{
        props: {
            model: {
                require: true,
                type: String
            }
        },
        methods: {
            submit(){
                this.$emit('on-submit');
            }
        }
    }
</script>

<style>

</style>