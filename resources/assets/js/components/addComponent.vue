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
                    <small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>
                </div>

                <div class="field">
                    <label>phone</label>
                    <div class="control">
                        <input class="input is-info" type="number" placeholder="name" v-model="list.phone">
                    </div>
                    <small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>
                </div>

                <div class="field">
                    <label>email</label>
                    <div class="control">
                        <input class="input is-info" type="email" placeholder="name" v-model="list.email">
                    </div>
                    <small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
                </div>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" @click="save">Save changes</button>
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
            save(){
                axios.post('/phonebook',this.$data.list).then((response)=> {
                    this.refresh();
                    this.close()

                })
                    .catch((error) => this.errors = error.response.data.errors)
            },
            refresh(){
                axios.post('getData').then((response)=> {
                    this.$parent.lists = response.data;
                })
                    .catch((error) => this.errors = error.response.data.errors)
            }

        }


    }
</script>
