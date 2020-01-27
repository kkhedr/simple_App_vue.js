<template>

    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label>name</label>
                    <div class="control">
                        <input class="input is-info" type="text" placeholder="name" v-model="list.name">
                    </div>

                </div>

                <div class="field">
                    <label>phone</label>
                    <div class="control">
                        <input class="input is-info" type="number" placeholder="name" v-model="list.phone">
                    </div>

                </div>

                <div class="field">
                    <label>email</label>
                    <div class="control">
                        <input class="input is-info" type="email" placeholder="name" v-model="list.email">
                    </div>

                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="close">Cancel</button>
            </footer>
        </div>
    </div>

</template>

<script>
    export default {
        components:{},
        props:['openmodal'],
        data(){
            return {
                list: {
                    name:'',
                    phone:'',
                    email:''
                },
                errors:{}
            }
        },
        methods:{
            close(){
                this.$emit('requestClose');
            },
        }


    }
</script>
